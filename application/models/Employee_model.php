<?php
  class Employee_model extends CI_model {
    public function get() {
      return $this->db->get("employees")->result_array();
    }

    public function add() {
      $data = [
        "name" => $this->input->post("name", true),
        "position" => $this->input->post("position", true),
        "division" => $this->input->post("division", true),
      ];

      $this->db->insert("employees", $data);
    }

    public function del($id) {
      $this->db->where("id", $id);
      $this->db->delete("employees");
    }

    public function detail($id) {
      return $this->db->get_where("employees", ["id" => $id])->row_array();
    }

    public function update() {
      $data = [
        "name" => $this->input->post("name", true),
        "position" => $this->input->post("position", true),
        "division" => $this->input->post("division", true),
      ];

      $this->db->where("id", $this->input->post("id"));
      $this->db->update("employees", $data);
    }

    public function search() {
      $keyword = $this->input->post("keyword", true);
      $this->db->like("name", $keyword);
      $this->db->or_like("position", $keyword);
      $this->db->or_like("division", $keyword);
      return $this->db->get("employees")->result_array();
    }
  }
?>