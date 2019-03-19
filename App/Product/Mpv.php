<?php
  // namespace
  namespace App\Product;

  // class Mvp extends class Car
  class Mpv extends Car {
    // method
    public function getInfo() {
      return "mobil {$this->name}, tipe {$this->type}, {$this->seat} seat";
    }
  }
?>