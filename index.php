<?php
  // attach file
  require "admin/functions.php";

  // check session
  checkSession("guest");

  // if cookie already exist
  if(isset($_COOKIE["id"]) && isset($_COOKIE["username"])) {
    // check cookie
    checkCookie($_COOKIE);
  }

  // if login btn has click
  if(isset($_POST["login"])) {
    // call login function
    if(login($_POST)) {
      // create cookie
      if(isset($_POST["remember"])) {
        createCookie($_POST["username"]);
      }
      // kick to admin
      header("Location: admin");
      exit;
    } else {
      // set error
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
  <title>ip-record | welcome</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="container">
    <div class="row ip-row">
      <div class="col s12 m6 offset-m3">
        <div class="ip-err-message">
          <?php if($error) : ?>
          <!-- error message -->
          <p style='color: red;'>username or password wrong ...</p>
          <?php endif ; ?>
        </div>
        <div class="card-panel ip-login">
          <form action="" method="POST">
            <ul>
              <li class="input-field">
                <i class="material-icons prefix">person</i>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" maxlength="50" autocomplete="off" required>
              </li>
              <li class="input-field">
                <i class="material-icons prefix">vpn_key</i>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" maxlength="50" autocomplete="off" required>
              </li>
              <li style="padding-left:43px;">
                <label>
                  <input type="checkbox" name="remember">
                  <span>Remember Me</span>
                </label>
              </li>
              <li style="padding-bottom:50px;">
                <button
                  class="btn waves-effect red lighten-2 right"
                  type="submit"
                  name="login"
                  style="margin-top:20px;"
                >
                  Login
                </button>
              </li>
            </ul>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="js/materialize.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>