<?php
  require "functions.php";
  checkSession("user");
  $id = $_GET["id"];
  // call read db function & put result on var
  $student = sql("SELECT * FROM students WHERE id = $id")[0];
  // if submit btn click
  if(isset($_POST["submit"])) {
    // check result update function 1 or -1
    if(update($_POST) > 0) {
      echo "
        <script>
          alert('success update');
          document.location.href = 'index.php';
        </script>
      ";
    } else {
      echo "<p style='color: red;'>update failed ...</p>";
      echo mysqli_error($conn);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>admin | edit student</title>
</head>
<body>
  <div class="section-add">
    <h2>Edit Student</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $student['id'] ?>">
      <input type="hidden" name="oldPhoto" value="<?= $student['photo'] ?>">
      <ul>
        <li>
          <label for="npm">npm</label>
          <input type="text" name="npm" id="npm" maxlength="10" value="<?= $student['npm'] ?>" required>
        </li>
        <li>
          <label for="name">name</label>
          <input type="text" name="name" id="name" maxlength="50" value="<?= $student['name'] ?>" required>
        </li>
        <li>
          <label for="email">email</label>
          <input type="email" name="email" id="email" maxlength="50" value="<?= $student['email'] ?>" required>
        </li>
        <li>
          <label for="study">study</label>
          <input type="text" name="study" id="study" maxlength="50" value="<?= $student['study'] ?>" required>
        </li>
        <li>
          <label for="photo">photo</label>
          <img src="img/<?= $student["photo"]; ?>" width="70" />
          <input type="file" name="photo" id="photo">
        </li>
        <li>
          <button name="submit">Update</button>
        </li>
      </ul>
    </form>
  </div>
</body>
</html>