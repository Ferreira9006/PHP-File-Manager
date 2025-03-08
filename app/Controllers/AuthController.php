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

  public function loginVerify($email, $password)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (!empty($email) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->login($email, $password);
      } else {
        header('Location: /');
        exit;
      }
    } else {
      header('Location: /login');
      exit;
    }
  }

  public function login($email, $password)
  {
    Application::model('UserModel');
    $userModel = new UserModel();

    $users = $userModel->getAccounts($email)->fetch();

    if (!empty($users) && $users['email'] == $email && password_verify($password, $users['password'])) {
      $_SESSION['email'] = $users['email'];
      $_SESSION['name'] = $users['name'];

      $_SESSION['toast_message'] = [
        'type' => 'success',
        'message' => 'Login successful! Welcome back.'
      ];

      header('Location: /');
      $this->log->info("User '{$users['name']}<{$users['email']}>' logged in");
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
