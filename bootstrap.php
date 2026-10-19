<?php

use Framework\SessionManager;

require __DIR__ . '/vendor/autoload.php';

$envPath = __DIR__ . '/.env';

if (file_exists($envPath)) {
    $_ENV = array_merge($_ENV, parse_ini_file($envPath));
}

SessionManager::start();