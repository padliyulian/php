<?php
  require "admin/functions.php";
  if(isset($_POST["signup"])) {
    if(signup($_POST) > 0) {
      echo "<p style='color: red;'>signup success ...</p>";
    } else {
      echo "<p style='color: red;'>signup failed ...</p>";
      echo mysqli_error($conn);
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>campus | sign-up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="julian-signup">
    <form action="" method="post">
      <ul>
        <li>
          <label for="name">Name</label>
          <input type="text" name="name" id="name" maxlength="50" autocomplete="off" placeholder="Fill Your Name" required>
        </li>
        <li>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" maxlength="50" autocomplete="off" placeholder="Fill Your Email" required>
        </li>
        <li>
          <label for="username">Username</label>
          <input type="text" name="username" id="username" maxlength="50" autocomplete="off" placeholder="Fill Your Username" required>
        </li>
        <li>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" maxlength="50" required>
        </li>
        <li>
          <label for="password2">Repeat Password</label>
          <input type="password" name="password2" id="password2" maxlength="50" required>
        </li>
        <li>
          <button type="submit" name="signup">Sign Up</button>
        </li>
      </ul>
    </form>
  </div>
</body>
</html>