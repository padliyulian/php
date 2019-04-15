<?php
  use GuzzleHttp\Client;

  class Employee_model extends CI_model {
    private $_client;

    public function __construct() {
      $this->_client = new Client([
        "base_uri" => "http://localhost/rest-api/rest-server/api/",
        "auth" => ["admin", "1234"]
      ]);
    }

    public function get() {
      $response = $this->_client->request("GET", "employee", [
        "query" => ["X-API-KEY" => "julian23"]
      ]);

      $result = json_decode($response->getBody()->getContents(), true);
      return $result["data"];
    }

    public function add() {
      $data = [
        "name" => $this->input->post("name", true),
        "position" => $this->input->post("position", true),
        "division" => $this->input->post("division", true),
        "X-API-KEY" => "julian23"
      ];

      $response = $this->_client->request("POST", "employee", [
        "form_params" => $data
      ]);

      $result = json_decode($response->getBody()->getContents(), true);
      return $result;
    }

    public function del($id) {
      $response = $this->_client->request("DELETE", "employee", [
        "form_params" => [
          "id" => $id,
          "X-API-KEY" => "julian23"
        ]
      ]);

      $result = json_decode($response->getBody()->getContents(), true);
      return $result;
    }

    public function detail($id) {
      $response = $this->_client->request("GET", "employee", [
        "query" => [
          "X-API-KEY" => "julian23",
          "id" => $id
          ]
      ]);

      $result = json_decode($response->getBody()->getContents(), true);
      return $result["data"][0];
    }

    public function update() {
      $data = [
        "name" => $this->input->post("name", true),
        "position" => $this->input->post("position", true),
        "division" => $this->input->post("division", true),
        "id" => $this->input->post("id", true),
        "X-API-KEY" => "julian23"
      ];

      $response = $this->_client->request("PUT", "employee", [
        "form_params" => $data
      ]);

      $result = json_decode($response->getBody()->getContents(), true);
      return $result;
    }
  }
?>