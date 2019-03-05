<?php
  // db conn
  $conn = mysqli_connect("localhost", "root", "root", "campus");

  // check conn
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // sign function
  function signin($data) {
    global $conn;

    // get user & passwd data and put on var
    $username = $data["username"];
    $password = $data["password"];    

    // search username from db
    $query = "SELECT * FROM users WHERE username = '$username'";
    $cUser = mysqli_query($conn, $query);

    // check if user exist or not
    if(mysqli_num_rows($cUser) === 1) {
      // put user on var row
      $row = mysqli_fetch_assoc($cUser);
      // check password
      if(password_verify($password, $row["password"])) {
        // create session
        $_SESSION["login"] = true;
        return true;
      }
    }
    return false;
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

  // check session function
  function checkSession($data) {
    // start session
    session_start();
    // if user
    if($data === "user") {
      if(!isset($_SESSION["login"])) {
        header("Location: ../signIn.php");
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

  // signout function
  function signout() {
    // unset session
    session_destroy();
    session_unset();
    $_SESSION = [];

    // unset cookie
    setcookie("id", "", time()-4000, "/");
    setcookie("username", "", time()-4000, "/");
    unset($_COOKIE["id"]);
    unset($_COOKIE["username"]);

    header("Location: ../signIn.php");
    exit;
  }

  // read function
  function sql($query) {
    // desc as global var
    global $conn;
    // sql on db with params/args 
    $result = mysqli_query($conn, $query);
    // create array var
    $rows = [];
    // looping data from db
    while($row = mysqli_fetch_assoc($result)) {
      // put every record on array var
      $rows[] = $row;
    }
    // return array
    return $rows;
  }

  // create function
  function add($data) {
    global $conn;

    $npm = htmlspecialchars($data["npm"]);
    $name = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $study = htmlspecialchars($data["study"]);

    // call upload function & put result on var $photo
    $photo = upload();
    // return false if upload function failed
    if(!$photo) {
      return false;
    }

    $sql = "INSERT INTO students VALUES (null, '$npm', '$name', '$email', '$study', '$photo')";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
  }

  // function upload
  function upload() {
    // get data from $_FILES superglobal & put on var
    $pName = $_FILES["photo"]["name"];
    $pSize = $_FILES["photo"]["size"];
    $pError = $_FILES["photo"]["error"];
    $pTmpName = $_FILES["photo"]["tmp_name"];

    // accepted photo ext
    $validExt = ["jpg", "jpeg", "png"];
    // parse string photo name
    $pExt = explode('.', $pName);
    // get last convert to lowercase
    $pExt = strtolower(end($pExt));

    // check photo ext
    if(!in_array($pExt, $validExt)) {
      echo "<p style='color: red;'>image extention accepted only jpg, jpeg or png ...</p>";
      return false;
    }

    // check photo size
    if($pSize > 1024000) {
      echo "<p style='color: red;'>image size accepted under 1MB ...</p>";
      return false;
    }

    // give new photo name
    $photoName = uniqid();
    $photoName .= ".".$pExt;
    // move photo from tmp to img folder
    move_uploaded_file($pTmpName, "img/".$photoName);

    // return photo name
    return $photoName;
  }

  // delete function
  function del($id) {
    global $conn;
    $sql = "DELETE FROM students WHERE id = $id";
    mysqli_query($conn, $sql);
    // return rows record 1(success) or -1(failed)
    return mysqli_affected_rows($conn);
  }

  // update function
  function update($data) {
    global $conn;
    // put all data on var
    $id = htmlspecialchars($data["id"]);
    $npm = htmlspecialchars($data["npm"]);
    $name = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $study = htmlspecialchars($data["study"]);
    $oldPhoto = htmlspecialchars($data["oldPhoto"]);

    if($_FILES["photo"]["error"] === 4) {
      $photo = $oldPhoto;
    } else {
      $photo = upload();
    }

    $sql = "UPDATE students SET
      npm = '$npm',
      name = '$name',
      email = '$email',
      study = '$study',
      photo = '$photo'
      WHERE id = $id
    ";
    mysqli_query($conn, $sql);
    // return check record db 1 or -1
    return mysqli_affected_rows($conn);
  }

  // search function
  function search($keyword) {
    // query
    $query = "SELECT * FROM students WHERE
      npm LIKE '%$keyword%' OR
      name LIKE '%$keyword%' OR
      email LIKE '%$keyword%' OR
      study LIKE '%$keyword%'
    ";
    // return function sql with query args/params
    return sql($query);
  }

  // function sign-up
  function signup($data) {
    global $conn;

    $name = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // check if username already exist
    $cUser = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($cUser)) {
      echo "<p style='color: red;'>username already exist ...</p>";
      return false;
    }

    // check if confirm password wrong
    if($password !== $password2) {
      echo "<p style='color: red;'>password mishmatch ...</p>";
      return false;
    }

    // encrypte password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users VALUES
      (null, '$name', '$email', '$username', '$password', 4)
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn); 
  }
?>