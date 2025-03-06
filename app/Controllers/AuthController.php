<?php

class AuthController {

  private $log;

  public function __construct($logger)
  {
    $this->log = $logger;
  }

  public function index() {
    echo 'login page';
  }

}

?>