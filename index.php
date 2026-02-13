<?php

/**
 * Front Controller
 */

// Define critical paths first
define('APP_ROOT', __DIR__ . '/app');
define('SRC_ROOT', APP_ROOT . '/src');

// Load Autoloader
require_once SRC_ROOT . '/Core/Autoloader.php';

// Register Autoloader
\App\Core\Autoloader::register();

// Load Environment Variables (.env)
// Assuming .env is in the project root (htdocs)
\App\Core\Env::load(__DIR__ . '/.env');

// Load Configuration (After Env)
require_once APP_ROOT . '/config/config.php';

// Simple Routing (for demonstration)
$controller = new \App\Controllers\HomeController();
$controller->index();
