<?php
require "functions.php";
checkSession("user");
$iplist = sql("SELECT * FROM ip");

require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$html = '
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ip-record | print</title>
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
      <h3>List Of IP</h3>
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
          </tr>
';

$no = 1;
foreach($iplist as $ip) {
  $html .= '
    <tr>
      <td style="text-align:center;">'.$no++.'</td>
      <td>'.$ip["ip"].'</td>
      <td>'.$ip["mac"].'</td>
      <td>'.$ip["user"].'</td>
			<td>'.$ip["division"].'</td>
			<td><img src="img/'.$ip["photo"].'" width="50" /></td>
			<td>'.$ip["device"].'</td>
			<td>'.$ip["info"].'</td>
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
$mpdf->Output("ip-record.pdf", "I");

?>
