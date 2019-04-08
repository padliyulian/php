<?php
  class Home extends CI_Controller {
    public function index($name="julian")
    {
      $data["title"] = "App | Home";
      $data["name"] = $name;

      $this->load->view("templates/header", $data);
      $this->load->view("home/index", $data);
      $this->load->view("templates/footer");
    }
  }
?>