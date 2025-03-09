<?php

class FileController
{
  private $log;

  public function __construct($logger)
  {
    $this->log = $logger;
  }

  public function index()
  {
    if (empty($_SESSION['email'])) {
      header('Location: /login');
      exit;
    }
    $this->showFiles();
  }

  public function showFiles()
  {
    Application::model('FileModel');
    $fileModel = new FileModel(BASE_PATH .'/'. $_ENV['UPLOAD_FOLDER']);

    $fileModel->getFiles();

    Application::view('template/header');
    Application::view('filesView');
    Application::view('template/footer');
  }
}
