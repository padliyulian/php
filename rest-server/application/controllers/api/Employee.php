<?php
  use Restserver\Libraries\REST_Controller;
  defined('BASEPATH') OR exit('No direct script access allowed');
  require APPPATH . 'libraries/REST_Controller.php';
  require APPPATH . 'libraries/Format.php';

  class Employee extends REST_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model("Employee_model");
    }

    public function index_get() {
      $id = $this->get("id");

      if($id === null){
        $employees = $this->Employee_model->get();
      } else {
        $employees = $this->Employee_model->get($id);
      }
      
      if($employees){
        $this->response([
          'status' => TRUE,
          'data' => $employees
        ], REST_Controller::HTTP_OK);
      } else {
        $this->response([
          'status' => FALSE,
          'message' => "404 not found ..."
        ], REST_Controller::HTTP_NOT_FOUND);
      }
    }

    public function index_delete() {
      $id = $this->delete("id");

      if($id === null){
        $this->response([
          'status' => FALSE,
          'message' => "Provide an id ..."
        ], REST_Controller::HTTP_BAD_REQUEST);
      } else {
        if($this->Employee_model->del($id) > 0){
          $this->response([
            'status' => TRUE,
            'id' => $id,
            'message' => 'delete success ...'
          ], REST_Controller::HTTP_OK);
        } else {
          $this->response([
            'status' => FALSE,
            'message' => "id not found ..."
          ], REST_Controller::HTTP_BAD_REQUEST);
        }
      }
    }

    public function index_post() {
      $data = [
        "name" => $this->post("name"),
        "position" => $this->post("position"),
        "division" => $this->post("division")
      ];

      if($this->Employee_model->add($data) > 0){
        $this->response([
          'status' => TRUE,
          'message' => 'add success ...'
        ], REST_Controller::HTTP_CREATED);
      } else {
        $this->response([
          'status' => FALSE,
          'message' => "add failed ..."
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }

    public function index_put() {
      $id = $this->put("id");
      $data = [
        "name" => $this->put("name"),
        "position" => $this->put("position"),
        "division" => $this->put("division")
      ];

      if($this->Employee_model->update($data, $id) > 0){
        $this->response([
          'status' => TRUE,
          'message' => 'update success ...'
        ], REST_Controller::HTTP_OK);
      } else {
        $this->response([
          'status' => FALSE,
          'message' => "update failed ..."
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }
  }
?>