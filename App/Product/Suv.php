<?php
  namespace App\Product;
  
  class Suv extends Car {
    protected $feature;

    // overriding
    public function __construct($name = "name", $type = "type", $seat = "seat", $feature = "feature") {
      parent::__construct($name, $type, $seat);
      $this->feature = $feature;
    }

    public function getInfo() {
      return "mobil {$this->name}, tipe {$this->type}, {$this->seat} seat , {$this->feature}";
    }
  }
?>