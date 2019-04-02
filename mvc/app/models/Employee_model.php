<?php
  class Employee_model {
    private $table = "employees", $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function getEmployee() {
      $this->db->sql("SELECT * FROM ". $this->table);
      return $this->db->resultSet();
    }

    public function getEmployeeById($id) {
      $this->db->sql("SELECT * FROM ". $this->table ." WHERE id=:id");
      $this->db->bind("id", $id);
      return $this->db->single();
    }

    public function addEmployee($data) {
      $query = "INSERT INTO ". $this->table ." VALUES (null, :name, :position, :division)";
      $this->db->sql($query);
      $this->db->bind("name", $data["name"]);
      $this->db->bind("position", $data["position"]);
      $this->db->bind("division", $data["division"]);
      $this->db->execute();

      return $this->db->getRow();
    }

    public function delEmployee($id) {
      $query = "DELETE FROM ". $this->table ." WHERE  id = :id";
      $this->db->sql($query);
      $this->db->bind("id", $id);
      $this->db->execute();
      return $this->db->getRow();
    }

    public function updateEmployee($data) {
      $query = "
        UPDATE ". $this->table ." SET 
        name = :name,
        position = :position,
        division = :division
        WHERE id = :id
      ";
      $this->db->sql($query);
      $this->db->bind("id", $data["id"]);
      $this->db->bind("name", $data["name"]);
      $this->db->bind("position", $data["position"]);
      $this->db->bind("division", $data["division"]);
      $this->db->execute();

      return $this->db->getRow();
    }

    public function searchEmployee() {
      $keyword = $_POST["keyword"];
      $query = "SELECT * FROM ". $this->table .
        " WHERE name LIKE :keyword OR position LIKE :keyword OR division LIKE :keyword";
      $this->db->sql($query);
      $this->db->bind("keyword", "%$keyword%");
      return $this->db->resultSet();
    }
  }
?>