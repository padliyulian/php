<?php
  class Home extends Controller {
    public function index() {
      $data["title"] = "home";
      $data["user"] = $this->model("User_model")->getUser();

      $this->view("templates/header", $data);
      $this->view("home/index", $data);
      $this->view("templates/footer");
    }
  }
?>