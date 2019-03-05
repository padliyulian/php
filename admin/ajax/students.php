<?php
  require "../functions.php";
  $keyword = $_GET["keyword"];
  $query = "SELECT * FROM students WHERE
      npm LIKE '%$keyword%' OR
      name LIKE '%$keyword%' OR
      email LIKE '%$keyword%' OR
      study LIKE '%$keyword%'
    ";
  $students = sql($query);
?>

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
