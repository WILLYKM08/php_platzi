<?php

require __DIR__ . '/../bootstrap.php';

use Framework\Router;
// use Framework\Database;

// $db = new Database();
$router = new Router();
$router->run();

// db()->query('INSERT INTO users(name, username, password) VALUES(:name, :username, :password)', [
//   'name' => 'WILLIAN CASTILLO',
//   'username' => 'wcastillo.imprentawilbot@gmail.com',
//   'password' => password_hash('Ernesto1994**', PASSWORD_DEFAULT),
// ]);