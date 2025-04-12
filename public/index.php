<?php
require_once __DIR__ . '/../bootstrap.php'; // Load Bootstrap

require_once BASE_PATH . '/vendor/autoload.php'; // Load Composer Dependencies
require_once APP_PATH . '/Application.php'; // Load Application Class

// Initialize Application
Application::init();

// Instantiate AltoRouter
$router = new AltoRouter();

// Set base path if needed (example for projects in a subdirectory)
//$router->setBasePath('/FileManager/public');

// Define routes
$router->map('GET', '/', function() {
  Application::controller('FileController');
    $controller = new FileController(Application::getLogger());
    $controller->index();
});

$router->map('GET', '/login', function() {
  Application::controller('AuthController');
    $controller = new AuthController(Application::getLogger());
    $controller->index();
});

$router->map('POST', '/login/verify', function() {
  Application::controller('AuthController');
  $controller = new AuthController(Application::getLogger());
  $controller->login($_POST['email'], $_POST['password']);
});

$router->map('GET', '/logout', function() {
  session_destroy();
  header('Location: /');
  exit;
});

// You can also define a route for folder navigation using a wildcard,
// for example: /files/[*:folderPath] to capture nested folder paths.

// Match the current request
$match = $router->match();
if ($match && is_callable($match['target'])) {
  call_user_func_array($match['target'], $match['params']);
} else {
  header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
  echo '404 Not Found';
}
