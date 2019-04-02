<?php
  class Employee extends Controller {
    public function index() {
      $data["title"] = "employee";
      $data["employees"] = $this->model("Employee_model")->getEmployee();

      $this->view("templates/header", $data);
      $this->view("employee/index", $data);
      $this->view("templates/footer");
    }

    public function detail($id) {
      $data["title"] = "employee detail";
      $data["employee"] = $this->model("Employee_model")->getEmployeeById($id);

      $this->view("templates/header", $data);
      $this->view("employee/detail", $data);
      $this->view("templates/footer");
    }

    public function add() {
      if( $this->model("Employee_model")->addEmployee($_POST) > 0 ) {
        Flasher::setFlash("success", "add", "success");
        header("Location: ". BASEURL ."/employee");
        exit;
      } else {
        Flasher::setFlash("failed", "add", "danger");
        header("Location: ". BASEURL ."/employee");
        exit;
      }
    }

    public function del($id) {
      if( $this->model("Employee_model")->delEmployee($id) > 0 ) {
        Flasher::setFlash("success", "delete", "success");
        header("Location: ". BASEURL ."/employee");
        exit;
      } else {
        Flasher::setFlash("failed", "delete", "danger");
        header("Location: ". BASEURL ."/employee");
        exit;
      }
    }

    public function edit() {
      echo json_encode($this->model("Employee_model")->getEmployeeById($_POST["id"]));
    }

    public function update() {
      if( $this->model("Employee_model")->updateEmployee($_POST) > 0 ) {
        Flasher::setFlash("success", "update", "success");
        header("Location: ". BASEURL ."/employee");
        exit;
      } else {
        Flasher::setFlash("failed", "update", "danger");
        header("Location: ". BASEURL ."/employee");
        exit;
      }
    }

    public function search() {
      $data["title"] = "employee";
      $data["employees"] = $this->model("Employee_model")->searchEmployee();

      $this->view("templates/header", $data);
      $this->view("employee/index", $data);
      $this->view("templates/footer");
    }
  }
?>