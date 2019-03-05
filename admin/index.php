<?php
  // attach php file
  require "functions.php";
  checkSession("user");

  // pagination
  $dataPerPage = 5;
  $totalData = count(sql("SELECT * FROM students"));
  $totalPage = ceil($totalData / $dataPerPage);
  $activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
  $index = ($dataPerPage * $activePage) - $dataPerPage;
  // read table from db & save on var
  $students = sql("SELECT * FROM students LIMIT $index, $dataPerPage");

  // if search button has click
  if(isset($_POST["search"])) {
    // overwrite var
    $students = search($_POST["keyword"]);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>admin | dashboard</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div class="julian-container">
    <h2>List Of Student</h2>
    <p>
      <a href="signOut.php">Sign Out</a>
    </p>
    <p>
      <a href="add.php">Add New</a>
    </p>
    <div class="julian-search">
      <form action="" method='post'>
        <input
          type="text"
          name="keyword"
          id="keyword"
          size="50"
          placeholder="Type Keyword Here ..."
          autocomplete="off"
          autofocus
        >
        <button type="submit" name="search">
          Search
        </button>
      </form>
    </div><br>

    <!-- prev -->
    <?php if($activePage > 1) : ?>
      <a href="?page=<?= $activePage - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <!-- page number -->
    <?php for($i = 1; $i <= $totalPage; $i++) : ?>
      <?php if($i == $activePage) : ?>
        <a href="?page=<?= $i; ?>" style="color:red; font-weight:bold;">
          <?= $i; ?>
        </a>
      <?php else : ?>
      <a href="?page=<?= $i; ?>"><?= $i; ?></a>
      <?php endif; ?>  
    <?php endfor; ?>

    <!-- next -->
    <?php if($activePage < $totalPage) : ?>
      <a href="?page=<?= $activePage + 1; ?>">&raquo;</a>
    <?php endif; ?>

    <div class="julian-table" id="julian-table">
      <table>
        <tr>
          <th>No</th>
          <th>Photo</th>
          <th>Npm</th>
          <th>Name</th>
          <th>Study</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        <!-- desc var no -->
        <?php $no = 1; ?>
        <!-- looping data -->
        <?php foreach ($students as $student) : ?>
          <tr>
            <td style="text-align: center;">
              <?= $no; ?>
            </td>
            <td>
              <img src="img/<?= $student["photo"]; ?>" />
            </td>
            <td>
              <!-- print data -->
              <?= $student["npm"]; ?>
            </td>
            <td>
              <?= $student["name"]; ?>
            </td>
            <td>
              <?= $student["study"]; ?>
            </td>
            <td>
              <?= $student["email"]; ?>
            </td>
            <td>
              <!-- push to edit.php with passed id -->
              <a href="edit.php?id=<?= $student["id"]; ?>">
                edit
              </a> |
              <a
                href="del.php?id=<?= $student["id"]; ?>"
                onclick="return confirm('delete this student?');"
              >
                delete
              </a>
            </td>
          </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  <!-- my javascript -->
  <script src="js/script.js"></script>
</body>
</html>