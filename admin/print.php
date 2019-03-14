<?php
require "functions.php";
checkSession("user");
$students = sql("SELECT * FROM students");

require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$html = '
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>campus | print</title>
    <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
      th, td {
        padding: 8px;
      }
      table tr th {
        background-color: #4CAF50;
        color: white;
        text-transform: uppercase;
      }
      table tr:nth-child(odd) {
        background-color: #f2f2f2;
      }
    </style>
  </head>
  <body>
    <div>
      <h3>List Of Student</h3>
      <table>
          <tr>
            <th>No</th>
            <th>Photo</th>
            <th>Npm</th>
            <th>Name</th>
            <th>Study</th>
            <th>Email</th>
          </tr>
';

$no = 1;
foreach($students as $student) {
  $html .= '
    <tr>
      <td style="text-align:center;">'.$no++.'</td>
      <td><img src="img/'.$student["photo"].'" width="50" /></td>
      <td>'.$student["npm"].'</td>
      <td>'.$student["name"].'</td>
      <td>'.$student["study"].'</td>
      <td>'.$student["email"].'</td>
    </tr>
  ';
}

$html .= '
      </table>   
    </div>   
  </body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output("students.pdf", "I");

?>
