<?php
  class App {
    protected $controller = "Home",
      $method="index",
      $params = [];

    public function __construct() {
      $url = $this->parseUrl();
      
      // controller
      if( file_exists("../app/controllers/". ucwords($url[0]) .".php") ) {
        $this->controller = ucwords($url[0]);
        unset($url[0]);
      }

      require_once "../app/controllers/". $this->controller .".php";
      $this->controller = new $this->controller;

      // method
      if( isset($url[1]) ) {
        if( method_exists($this->controller, $url[1]) ) {
          $this->method = $url[1];
          unset($url[1]);
        }
      }

      // params
      if ( !empty($url) ) {
        $this->params = array_values($url);
      }

      // run controller, method & params
      call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
      if( isset($_GET["url"]) ) {
        $url = rtrim($_GET["url"], "/");
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode("/", $url);
        return $url;
      }
    }
  }
?>  