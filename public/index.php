<?php


require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();
session_start();

require_once __DIR__ . '/web.php';
require_once __DIR__ . '/api.php';

$router->resolve();