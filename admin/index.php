<?php
  // attach file
  require "functions.php";

  // check session
  checkSession("user");

  // paginantion
  $dataPerPage = 5;
  $totalData = count(sql("SELECT * FROM ip"));
  $totalPage = ceil($totalData / $dataPerPage);
  $activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
  $index = ($dataPerPage * $activePage) - $dataPerPage;
  
  $iplist = sql("SELECT * FROM ip LIMIT $index, $dataPerPage");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ip-record | admin</title>
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
    <div class="row valign-wrapper center-align" style="overflow:auto;">
      <div class="ip-search col s10">
        <div class="input-field">
          <i class="material-icons prefix">search</i>
          <input
            type="text"
            name="keyword"
            id="keyword"
            size="50"
            autocomplete="off"
          >
          <label for="keyword">Type Keyword Here ...</label>
        </div>  
      </div>
      <div class="col s2">
        <a href="print.php" target="_blank" class="waves-effect red lighten-2 btn">
          print
        </a>
      </div>
    </div>  
    <div id="ip-container" style="overflow:auto;">
      <table>
        <thead>
          <tr>
            <th>no</th>
            <th>ip address</th>
            <th>mac address</th>
            <th>user</th>
            <th>division</th>
            <th>photo</th>
            <th>device</th>
            <th>info</th>
            <th>actions</th>
          </tr>
        </thead>  
        <?php $no = $index + 1; ?>
        <?php foreach($iplist as $ip) : ?>
          <tbody>
            <?php if($no % 2 === 0) : ?>
              <tr style="background:#f2f2f2;">
            <?php else : ?>
              <tr>
            <?php endif; ?>
              <td style="text-align:center;"><?= $no; ?></td>
              <td><?= $ip["ip"]; ?></td>
              <td><?= $ip["mac"]; ?></td>
              <td><?= $ip["user"]; ?></td>
              <td><?= $ip["division"]; ?></td>
              <td>
                <img src="img/<?= $ip["photo"]; ?>">
              </td>
              <td><?= $ip["device"]; ?></td>
              <td><?= $ip["info"]; ?></td>
              <td>
                <a href="edit.php?id=<?= $ip["id"]; ?>">edit</a> |
                <a href="del.php?id=<?= $ip["id"]; ?>" onclick="return confirm('delete?');">
                  delete
                </a>
              </td>
            </tr>
          </tbody>    
        <?php $no++; ?>
        <?php endforeach ; ?>
      </table>
    </div>
    <div class="ip-pagination center-align">
      <ul class="pagination">
        <!-- prev -->
        <?php if($activePage > 1) : ?>
          <li>
            <a href="?page=<?= $activePage - 1; ?>">
              <i class="material-icons">chevron_left</i>
            </a>
          </li>
        <?php else : ?>
          <li class="disabled">
            <a href="#!">
              <i class="material-icons">chevron_left</i>
            </a>
          </li>
        <?php endif; ?>
        <!-- page number -->
        <?php for($i = 1; $i <= $totalPage; $i++) : ?>
          <?php if($i == $activePage) : ?>
            <li class="active">
              <a href="?page=<?= $i; ?>">
                <?= $i; ?>
              </a>
            </li>
          <?php else : ?>
          <li class="waves-effect">
            <a href="?page=<?= $i; ?>"><?= $i; ?></a>
          </li>
          <?php endif; ?>  
        <?php endfor; ?>
        <!-- next -->
        <?php if($activePage < $totalPage) : ?>
          <li>
            <a href="?page=<?= $activePage + 1; ?>">
              <i class="material-icons">chevron_right</i>
            </a>
          </li>
        <?php else : ?>
          <li class="disabled">
            <a href="#!">
              <i class="material-icons">chevron_right</i>
            </a>
          </li>  
        <?php endif; ?>
      </ul>
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
  <script src="js/home.js"></script>
</body>
</html>