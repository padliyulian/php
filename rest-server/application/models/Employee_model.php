<?php
  class Employee_model extends CI_Model {
    public function get($id = null) {
      if($id === null){
        return $this->db->get("employees")->result_array();
      } else {
        return $this->db->get_where("employees", ["id" => $id])->result_array();
      }
    }

    public function del($id) {
      $this->db->delete("employees", ["id" => $id]);
      return $this->db->affected_rows();
    }

    public function add($data) {
      $this->db->insert("employees", $data);
      return $this->db->affected_rows();
    }

    public function update($data, $id) {
      $this->db->update("employees", $data, ["id" => $id]);
      return $this->db->affected_rows();
    }
  }
?>