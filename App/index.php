<?php
  // attach init file
  require_once "init.php";

  // use namespace alias
  use App\Product\Mpv as Mobile1;
  use App\Product\Suv as Mobile2;

  // instance obj
  $avanza = new Mobile1("all new avanza", "G M/T", 8);
  $fortuner = new Mobile2("new fortuner", "G M/T", 8, "sun roof");

  // print obj
  echo $avanza->getInfo();
  echo "<br>";
  echo $fortuner->getInfo();
?>