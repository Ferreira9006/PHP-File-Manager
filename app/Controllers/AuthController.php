<?php

class AuthController
{

  private $log;

  public function __construct($logger)
  {
    $this->log = $logger;
  }

  public function index()
  {
    Application::view('/template/header');
    Application::view('LoginView');
    Application::view('/template/footer');
  }

  public function login($email, $password)
  {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      header ('Location: /login');
      exit;
    }

    if (empty($email) && empty($password) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['toast_message'] = [
        'type'    => 'danger',
        'message' => 'Please provide a valid email and password.'
      ];
      header('Location: /login');
      exit;
    }

    Application::model('UserModel');
    $userModel = new UserModel();

    $user = $userModel->getAccounts($email)->fetch();

    if ($user && $user['email'] == $email && password_verify($password, $user['password'])) {
      $_SESSION['email'] = $user['email'];
      $_SESSION['name'] = $user['name'];

      $_SESSION['toast_message'] = [
        'type' => 'success',
        'message' => 'Login successful! Welcome back.'
      ];

      header('Location: /');
      $this->log->info("User '{$user['name']}<{$user['email']}>' logged in");
      exit;
    }

    $_SESSION['toast_message'] = [
      'type' => 'danger',
      'message' => 'Incorrect login information. Please try again.'
    ];
    header('Location: /login');
    exit;
  }
}