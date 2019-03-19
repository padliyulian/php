<?php
  // auto loading
  spl_autoload_register(function($class) {
    // explode namespace
    $class = explode("\\", $class);
    // get end name
    $class = end($class);
    // call
    require_once "Product/". $class .".php";
  });
?>