<?php
  require "../functions.php";
  checkSession("user");

  $keyword = $_GET["keyword"];
  $query = "SELECT * FROM ip WHERE
      ip LIKE '%$keyword%' OR
      mac LIKE '%$keyword%' OR
      user LIKE '%$keyword%' OR
      division LIKE '%$keyword%'
    ";
  $iplist = sql($query);
?>

<table>
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
  <?php $no = 1; ?>
  <?php foreach($iplist as $ip) : ?>
  <tr>
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
  <?php $no++; ?>
  <?php endforeach ; ?>
</table>
