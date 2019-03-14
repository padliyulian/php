<?php
  // attach file
  require "functions.php";

  // check session
  checkSession("user");

  $users = sql("SELECT * FROM users");

  if(isset($_POST["add"])) {
    if(adduser($_POST) > 0) {
      // if success
      $success = true;
      echo "
        <script>
          setTimeout(function(){
            document.location.href = 'user.php';
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
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ip-record | user</title>
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
      <div class="col s12 m8 offset-m2">
        <?php if($success) : ?>
          <p style="color:green;">add success</p>
        <?php endif; ?>
        <?php if($error) : ?>
          <p style="color:red;">add failed</p>
          <p><?= $errMsg; ?></p>
        <?php endif; ?>
        <!-- Modal Trigger -->
        <a class="waves-effect red lighten-2 btn modal-trigger" href="#modal1">User List</a>
        <!-- Modal Structure -->
        <div id="modal1" class="modal bottom-sheet">
          <div class="modal-content">
            <h5 class="red-text">User List</h5>
            <div class="ip-userlist">
              <table>
                <tr>
                  <th>no</th>
                  <th>name</th>
                  <th>email</th>
                  <th>username</th>
                  <th>password</th>
                  <th>level</th>
                  <th>action</th>
                </tr>
                <?php $no = 1; ?>
                <?php foreach($users as $user) : ?>
                <tr>
                  <td style="text-align:center;"><?= $no; ?></td>
                  <td><?= $user["name"]; ?></td>
                  <td><?= $user["email"]; ?></td>
                  <td><?= $user["username"]; ?></td>
                  <td><?= $user["password"]; ?></td>
                  <td style="text-align:center;"><?= $user["level"]; ?></td>
                  <td>
                    <a href="delUser.php?id=<?= $user["id"]; ?>" onclick="return confirm('delete?');">delete</a>
                  </td>
                </tr>
                <?php $no++; ?>
                <?php endforeach ; ?>
              </table>
            </div>
          </div>
          <div class="modal-footer" style="padding-right:25px;">
            <a href="#!" class="modal-close waves-effect btn red lighten-2">Close</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m8 offset-m2 ip-useradd">
        <form action="" method="post">
          <ul>
            <li class="input-field">
              <i class="material-icons prefix">person</i>
              <input type="text" name="name" id="name" maxlength="50" autocomplete="off" placeholder="Fill Your Name" required>
              <label for="name">Name</label>
            </li>
            <li class="input-field">
              <i class="material-icons prefix">email</i>
              <input type="email" name="email" id="email" maxlength="50" autocomplete="off" placeholder="Fill Your Email" required>
              <label for="email">Email</label>
            </li>
            <li class="input-field">
              <i class="material-icons prefix">fingerprint</i>
              <input type="text" name="username" id="username" maxlength="50" autocomplete="off" placeholder="Fill Your Username" required>
              <label for="username">Username</label>
            </li>
            <li class="input-field">
              <i class="material-icons prefix">vpn_key</i>
              <input type="password" name="password" id="password" maxlength="50" required>
              <label for="password">Password</label>
            </li>
            <li class="input-field">
              <i class="material-icons prefix">vpn_key</i>
              <input type="password" name="password2" id="password2" maxlength="50" required>
              <label for="password2">Repeat Password</label>
            </li>
            <li>
              <button type="submit" name="add" class="btn red lighten-2 right">Add</button>
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
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.modal');
      var instances = M.Modal.init(elems);
    });
  </script>
</body>
</html>