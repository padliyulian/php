<?php
  // name space
  namespace App\Product;

  // abstract class Car implements interface Drive
  abstract class Car implements Drive {
    // property
    protected $name, $type, $seat;

    // constructor
    public function __construct($name = "name", $type = "type", $seat = "seat") {
      $this->name = $name;
      $this->type = $type;
      $this->seat = $seat;
    }

    // abstract method
    abstract public function getInfo();
  }
?>