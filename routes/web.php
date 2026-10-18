<?php

use App\Controllers\HomeController;
use App\Controllers\PostsController;
use App\Controllers\AboutController;
use App\Controllers\LinksController;
use App\Controllers\AuthController;
use Framework\Middleware\Authenticated;


$router->get('/',              [HomeController::class,  'index']);
$router->get('/posts',         [PostsController::class, 'show']);
$router->get('/about',         [AboutController::class, 'index']);

$router->get('/links',           [LinksController::class, 'index']);
$router->get('/links/create',    [LinksController::class, 'show'],    Authenticated::class);
$router->post('/links/store',    [LinksController::class, 'store'],   Authenticated::class);
$router->delete('/links/delete', [LinksController::class, 'destroy'], Authenticated::class);
$router->get('/links/edit',      [LinksController::class, 'edit'],    Authenticated::class);
$router->put('/links/update',    [LinksController::class, 'update'],  Authenticated::class);

$router->get('/login',    [AuthController::class, 'login']);
$router->post('/login',   [AuthController::class, 'authenticate']);
$router->post('/logout',  [AuthController::class, 'logout'], Authenticated::class);