<?php
  class Employee extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model("Employee_model");
      $this->load->library("form_validation");
    }

    public function index() {
      $data["title"] = "App | Employee";
      $data["employees"] = $this->Employee_model->get();

      if($this->input->post("keyword")) {
        $data["employees"] = $this->Employee_model->search();
      }

      $this->load->view("templates/header", $data);
      $this->load->view("employee/index", $data);
      $this->load->view("templates/footer");
    }

    public function add() {
      $data["title"] = "App | Add";

      $this->form_validation->set_rules("name", "Name", "required");
      $this->form_validation->set_rules("position", "Position", "required");
      $this->form_validation->set_rules("division", "Division", "required");

      if($this->form_validation->run() == FALSE) {
        $this->load->view("templates/header", $data);
        $this->load->view("employee/add");
        $this->load->view("templates/footer");
      } else {
        $this->Employee_model->add();
        $this->session->set_flashdata("flash", "Add");
        redirect("employee");
      }
    }

    public function del($id) {
      $this->Employee_model->del($id);
      $this->session->set_flashdata("flash", "Delete");
      redirect("employee");
    }

    public function detail($id) {
      $data["title"] = "Detail";
      $data["employee"] = $this->Employee_model->detail($id);

      $this->load->view("templates/header", $data);
      $this->load->view("employee/detail", $data);
      $this->load->view("templates/footer");
    }

    public function edit($id) {
      $data["title"] = "App | Edit";
      $data["employee"] = $this->Employee_model->detail($id);
      $data["position"] = [
        "Front End", "Back End", "SQA", "Project Manager", "UI/UX", "DevOps"
      ];

      $this->form_validation->set_rules("name", "Name", "required");
      $this->form_validation->set_rules("position", "Position", "required");
      $this->form_validation->set_rules("division", "Division", "required");

      if($this->form_validation->run() == FALSE) {
        $this->load->view("templates/header", $data);
        $this->load->view("employee/edit", $data);
        $this->load->view("templates/footer");
      } else {
        $this->Employee_model->update();
        $this->session->set_flashdata("flash", "Update");
        redirect("employee");
      }
    }
  }
?>