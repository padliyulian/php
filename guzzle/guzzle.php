<?php
  require "vendor/autoload.php";
  use GuzzleHttp\Client;

  $client = new Client();
  $response = $client->request("GET", "http://www.omdbapi.com", [
    "query" => [
      "apikey" => "1a7912c3",
      "s" => "avenger"
    ]
  ]);

  $result = json_decode($response->getBody()->getContents(), true);
?>

<ul>
  <?php foreach($result["Search"] as $movie) : ?>
    <li><?= $movie["Title"] ?></li>
  <?php endforeach; ?>
</ul>