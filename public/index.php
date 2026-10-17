<?php

require __DIR__ . '/../bootstrap.php';

use Framework\Router;
use Framework\Database;

$db = new Database();
$router = new Router();
$router->run();