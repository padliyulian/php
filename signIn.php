<?php
  require "admin/functions.php";
  if(isset($_POST["signin"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];    

    $query = "SELECT * FROM users WHERE username = '$username'";
    $cUser = mysqli_query($conn, $query);

    if(mysqli_num_rows($cUser) === 1) {
      $row = mysqli_fetch_assoc($cUser);
      if(password_verify($password, $row["password"])) {
        header("Location: admin");
        exit;
      }
    }

    $error = true;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>campus | signin</title>
</head>

<body>

  <div class="julian-signin">
    <?php if($error) : ?>
      <p style='color: red;'>username or password wrong ...</p>
    <?php endif ; ?>
    <form action="" method="POST">
      <ul>
        <li>
          <label for="username">Username</label>
          <input type="text" name="username" id="username" maxlength="50" autocomplete="off" required>
        </li>
        <li>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" maxlength="50" autocomplete="off" required>
        </li>
        <li>
          <button type="submit" name="signin">Sign In</button>
        </li>
      </ul>
    </form>
  </div>

</body>
</html>