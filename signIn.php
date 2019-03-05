<?php
  // including file
  require "admin/functions.php";

  // check if cookie already exist
  if(isset($_COOKIE["id"]) && isset($_COOKIE["username"])) {
    checkCookie($_COOKIE);
  }

  // check session
  checkSession("guest");

  if(isset($_POST["signin"])) {
    if(signin($_POST)) {
      // create cookie
      if(isset($_POST["remember"])) {
        createCookie($_POST["username"]);
      }
      header("Location: admin");
      exit;
    } else {
      // set error true
      $error = true;
    }
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
      <!-- error message -->
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
          <input type="checkbox" name="remember" id="remember">
          <label for="remember">Remember Me</label>
        </li>
        <li>
          <button type="submit" name="signin">Sign In</button>
        </li>
      </ul>
    </form>
  </div>

</body>
</html>