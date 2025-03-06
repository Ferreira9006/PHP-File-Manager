<?php
// Load Bootstrap
require_once __DIR__ . '/../bootstrap.php';

// Load Composer Dependencies
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Load env variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Enable logging system
$log = new Logger('app');
$log->pushHandler(new StreamHandler(__DIR__ . '/../logs/app.log', Logger::DEBUG));
$log->info('Application has started');

// Routing
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

switch ($uri) {
  case '/':
    require_once CONTROLLERS_PATH . '/FileController.php';
    $controller = new FileController($log);
    $controller->index();
    break;

  case '/login':
    require_once CONTROLLERS_PATH . '/AuthController.php';
    $controller = new AuthController($log);
    $controller->index();
    break;
}
?>