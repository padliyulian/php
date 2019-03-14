<?php
  // DBMS connect
  $conn = mysqli_connect("localhost","root","root","ip-record");

  // check connection
  if (!$conn) {
    die("DBMS connect failed " .mysqli_connect_error());
  }

  // check session function
  function checkSession($data) {
    // start session
    session_start();
    // if user
    if($data === "user") {
      if(!isset($_SESSION["login"])) {
        header("Location: ../index.php");
        exit;
      }
    }
    // if guest
    if($data === "guest") {
      if(isset($_SESSION["login"])) {
        header("Location: admin");
        exit;
      }
    }
  }

  // check cookie function
  function checkCookie($data) {
    global $conn;
    // get cookie & put on var
    $id = $data["id"];
    $username = $data["username"];
    // check id from db
    $query = "SELECT * FROM users WHERE id = $id";
    // call sql function
    $row = sql($query);
    // if username match
    if($username === hash("sha256", $row["username"])) {
      // create session
      $_SESSION["login"] = true;
    }
  }

  // create cookie function
  function createCookie($username) {
    global $conn;

    // search username from db
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // create cookie
    setcookie("id", $row["id"], time()+3600, "/");
    setcookie("username", hash("sha256", $row["username"]), time()+3600, "/");
  }

  // login function
  function login($data) {
    global $conn;

    // get user & passwd data and put on var
    $username = $data["username"];
    $password = $data["password"];    

    // search username from db
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // check if user exist or not
    if(mysqli_num_rows($result) === 1) {
      // put user on var row
      $row = mysqli_fetch_assoc($result);
      // check password
      if(password_verify($password, $row["password"])) {
        // create session
        $_SESSION["login"] = true;
        return true;
      }
    }
    return false;
  }

  // logout function
  function logout() {
    // unset session
    session_destroy();
    session_unset();
    $_SESSION = [];

    // unset cookie
    setcookie("id", "", time()-4000, "/");
    setcookie("username", "", time()-4000, "/");
    unset($_COOKIE["id"]);
    unset($_COOKIE["username"]);

    header("Location: ../index.php");
    exit;
  }

  // read function
  function sql($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] =  $row;
    }
    return $rows;
  }

  // add ip function
  function add($data) {
    global $conn;

    $ip = htmlspecialchars($data["ip"]);
    $mac = htmlspecialchars($data["mac"]);
    $user = htmlspecialchars($data["user"]);
    $division = htmlspecialchars($data["division"]);
    $device = htmlspecialchars($data["device"]);
    $info = htmlspecialchars($data["info"]);

    $photo = upload();
    
    if(!$photo) {
      return false;
    }

    $sql = "INSERT INTO ip VALUES (
      null, '$ip', '$mac', '$user', '$division', '$photo', '$device', '$info'
      )";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
  }

  // upload image function
  function upload() {
    $pName = $_FILES["photo"]["name"];
    $pSize = $_FILES["photo"]["size"];
    $pError = $_FILES["photo"]["error"];
    $pTmpName = $_FILES["photo"]["tmp_name"];

    $validExt = ["jpg", "jpeg", "png"];
    $pExt = explode('.', $pName);
    $pExt = strtolower(end($pExt));

    if(!in_array($pExt, $validExt)) {
      echo "<p style='color: red;'>image extention accepted only jpg, jpeg or png ...</p>";
      return false;
    }

    if($pSize > 1024000) {
      echo "<p style='color: red;'>image size accepted under 1MB ...</p>";
      return false;
    }

    $photoName = uniqid();
    $photoName .= ".".$pExt;
    move_uploaded_file($pTmpName, "img/".$photoName);

    return $photoName;
  }

  // delete ip function
  function del($id) {
    global $conn;
    $query = "DELETE FROM ip WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
  }

  // delete user function
  function delUser($id) {
    global $conn;
    $query = "DELETE FROM users WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
  }

  // update function
  function update($data) {
    global $conn;
    // put all data on var
    $id = htmlspecialchars($data["id"]);
    $ip = htmlspecialchars($data["ip"]);
    $mac = htmlspecialchars($data["mac"]);
    $user = htmlspecialchars($data["user"]);
    $division = htmlspecialchars($data["division"]);
    $device = htmlspecialchars($data["device"]);
    $info = htmlspecialchars($data["info"]);
    $oldPhoto = htmlspecialchars($data["oldPhoto"]);
 
    if($_FILES["photo"]["error"] === 4) {
      $photo = $oldPhoto;
    } else {
      $photo = upload();
    }

    $query = "UPDATE ip SET
      ip = '$ip',
      mac = '$mac',
      user = '$user',
      division = '$division',
      photo = '$photo',
      device = '$device',
      info = '$info'
      WHERE id = $id
    ";

    mysqli_query($conn, $query);
    // return check record db 1 or -1
    return mysqli_affected_rows($conn);
  }

  // function adduser
  function adduser($data) {
    global $conn;

    $name = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // check if username already exist
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
      echo "<p style='color: red; position:fixed; top:11%; left:40%;'>username already exist ...</p>";
      return false;
    }

    // check if confirm password wrong
    if($password !== $password2) {
      echo "<p style='color: red; position:fixed; top:11%; left:40%;'>password mishmatch ...</p>";
      return false;
    }

    // encrypte password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users VALUES
      (null, '$name', '$email', '$username', '$password', 1)
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn); 
  }
?>