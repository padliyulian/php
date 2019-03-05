<?php
  require "functions.php";
  checkSession("user");

  if(isset($_POST["submit"])) {
    if(add($_POST) > 0) {
      echo "<p style='color: red;'>add success ...</p>";
      echo "
        <script>
          setTimeout(function(){
            document.location.href = 'index.php';
          }, 2000);
        </script>
      ";
    } else {
      echo "<p style='color: red;'>add failed ...</p>";
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
  <title>admin | add student</title>
</head>
<body>
  <div class="section-add">
    <h2>Add Student</h2>
    <!-- handle post for data $_POST & enctype for file $_FILES -->
    <form action="" method="post" enctype="multipart/form-data">
      <ul>
        <li>
          <label for="npm">npm</label>
          <input type="text" name="npm" id="npm" maxlength="10" required>
        </li>
        <li>
          <label for="name">name</label>
          <input type="text" name="name" id="name" maxlength="50" required>
        </li>
        <li>
          <label for="email">email</label>
          <input type="email" name="email" id="email" maxlength="50" required>
        </li>
        <li>
          <label for="study">study</label>
          <input type="text" name="study" id="study" maxlength="50" required>
        </li>
        <li>
          <label for="photo">photo</label>
          <input type="file" name="photo" id="photo" maxlength="50" required>
        </li>
        <li>
          <button name="submit">Add</button>
        </li>
      </ul>
    </form>
  </div>
</body>
</html>