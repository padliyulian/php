<?php
  class About extends Controller {
    public function index($name="julian", $age=31) {
      $data["title"] = "about";
      $data["name"] = $name;
      $data["age"] = $age;

      $this->view("templates/header", $data);
      $this->view("about/index", $data);
      $this->view("templates/footer");
    }

    public function page() {
      $data["title"] = "page";

      $this->view("templates/header", $data);
      $this->view("about/page");
      $this->view("templates/footer");
    }
  }
?>