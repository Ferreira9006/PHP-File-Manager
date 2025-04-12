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

  public static function getLogger()
  {
    return self::$log;
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

  public static function customEcho($text)
  {
    if (strlen($text) > 20) {
      return htmlspecialchars(substr($text, 0, 20)) . '...';
    } else {
      return htmlspecialchars($text);
    }
  }
}
