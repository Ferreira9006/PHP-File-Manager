<?php

use Dotenv\Dotenv;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Application
{

  public static $log;

  public static function init()
  {
    session_start();

    // Load env variables
    $dotenv = Dotenv::createImmutable(BASE_PATH);
    $dotenv->load();

    // Enable logging system
    self::$log = new Logger('app');
    self::$log->pushHandler(new StreamHandler(BASE_PATH . '/logs/app.log', Logger::DEBUG));
    self::$log->info('Application has started');
  }

  public static function view($view, $data = [])
  {
    // Extract the data so that variables are available in the view
    if (!empty($data)) {
      extract($data);
    }

    require_once VIEWS_PATH . '/' . $view . '.php';
  }

  public static function controller($controller)
  {
    require_once CONTROLLERS_PATH . '/' . $controller . '.php';
  }

  public static function model($model)
  {
    require_once MODELS_PATH . '/' . $model . '.php';
  }

  public static function routes($route)
  {
    switch ($route) {
      case '/':
        Application::controller('FileController');
        $controller = new FileController(self::$log);
        $controller->index();
        break;

      case '/login':
        Application::controller('AuthController');
        $controller = new AuthController(self::$log);
        $controller->index();
        break;

      case '/login/verify':
        Application::controller('AuthController');
        $controller = new AuthController(self::$log);
        $controller->login($_POST['email'], $_POST['password']);
        break;

      case '/logout':
        session_destroy();
        header('Location: /');
        exit;
        break;
    }
  }
}
