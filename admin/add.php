<?php
  // attach file
  require "functions.php";

  // check session
  checkSession("user");

  // on submit
  if(isset($_POST["submit"])) {
    // call add function
    if(add($_POST) > 0) {
      // if success
      $success = true;
      echo "
        <script>
          setTimeout(function(){
            document.location.href = 'index.php';
          }, 3000);
        </script>
      ";
    } else {
      // if error
      $error = true;
      $errMsg = mysqli_error($conn);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ip-record | add</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="ip-navbar">
    <div class="navbar-fixed">
      <nav>
        <div class="container">
          <div class="nav-wrapper">
            <a href="index.php" class="brand-logo">IP-Record</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down ip-link">
              <li><a href="index.php">Home</a></li>
              <li><a href="add.php">IP</a></li>
              <li><a href="user.php">User</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div>
        </div>  
      </nav>
    </div>  
    <ul class="sidenav ip-link" id="mobile-demo">
      <li class="center-align">
        <div style="background:#E56976; color:white; font-weight:bold;">
          IP-Record
        </div>
      </li>
      <li>
        <a href="index.php">
          <i class="material-icons prefix">home</i>
          Home
        </a>
      </li>
      <li>
        <a href="add.php">
          <i class="material-icons prefix">fingerprint</i>
          IP
        </a>
      </li>
      <li>
        <a href="user.php">
          <i class="material-icons prefix">group</i>
          User
        </a>
      </li>
      <li>
        <a href="logout.php">
          <i class="material-icons prefix">exit_to_app</i>
          Logout
        </a>
      </li>
    </ul>
  </div>
  <div class="container">
    <div class="row">
      <div class="col s12 m8 offset-m2 ip-addip">
        <?php if($success) : ?>
          <p style="color:green;">add success</p>
        <?php endif; ?>
        <?php if($error) : ?>
          <p style="color:red;">add failed</p>
          <p><?= $errMsg; ?></p>
        <?php endif; ?>
        <!-- handle post for data $_POST & enctype for file $_FILES -->
        <form action="" method="post" enctype="multipart/form-data">
          <ul>
            <li class="input-field">
              <i class="material-icons prefix">fingerprint</i>
              <input type="text" name="ip" id="ip" maxlength="20" required>
              <label for="ip">ip address</label>
            </li>
            <li class="input-field">
              <i class="material-icons prefix">build</i>
              <input type="text" name="mac" id="mac" maxlength="20" required>
              <label for="mac">mac address</label>
            </li>
            <li class="input-field">
              <i class="material-icons prefix">person</i>
              <input type="text" name="user" id="user" maxlength="50" required>
              <label for="user">user</label>
            </li>
            <li class="input-field">
            `<i class="material-icons prefix">group</i>
              <input type="text" name="division" id="division" maxlength="50" required>
              <label for="division">division</label>
            </li>
            <li class="input-field">
              <i class="material-icons prefix">important_devices</i>
              <input type="text" name="device" id="device" maxlength="50" required>
              <label for="device">device</label>
            </li>
            <li class="input-field">
              <i class="material-icons prefix">info</i>
              <textarea
                class="materialize-textarea"
                name="info" id="info"
                cols="30" rows="10"
                maxlength="100"
                required
              ></textarea>
              <label for="info">info</label>
            </li>
            <li class="file-field input-field">
              <div class="btn red lighten-2">
                <span>photo</span>
                <input type="file" name="photo" id="photo" required>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload Photo ...">
              </div>
            </li>
            <li>
              <button name="submit" class="btn red lighten-2 right">Add</button>
            </li>
          </ul>
        </form>
      </div>
    </div>
    <footer>
      <div class="row center-align">
        <div class="col s12">
          <div>
            <span>
              &copy; 2019 <a href="https://padliyulian.github.io" target="_blank">padliyulian@gmail.com</a>
            </span>
          </div>
        </div>
      </div>
    </footer>
  </div>    
  <script src="js/materialize.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>