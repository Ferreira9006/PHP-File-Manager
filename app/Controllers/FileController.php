<?php

class FileController {

  private $log;

  public function __construct($logger)
  {
    $this->log = $logger;
  }

  public function index() {
    if (empty($_SESSION['email']))
    {
      header('Location: /login');
      exit;
    }
  }

}

?>