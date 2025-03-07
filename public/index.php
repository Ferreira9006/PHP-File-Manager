<?php
require_once __DIR__ . '/../bootstrap.php'; // Load Bootstrap

require_once BASE_PATH . '/vendor/autoload.php'; // Load Composer Dependencies
require_once APP_PATH . '/Application.php'; // Load Application Class
Application::init(); // Initialize the Application

// Routing
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
Application::Routes($uri);
?>