<?php

use App\Controllers\HomeController;
use App\Controllers\PostsController;
use App\Controllers\AboutController;
use App\Controllers\LinksController;


$router->get('/',              [HomeController::class,  'index']);
$router->get('/posts',         [PostsController::class, 'show']);
$router->get('/about',         [AboutController::class, 'index']);

$router->get('/links',           [LinksController::class, 'index']);
$router->get('/links/create',    [LinksController::class, 'show']);
$router->post('/links/store',    [LinksController::class, 'store']);
$router->delete('/links/delete', [LinksController::class, 'destroy']);
$router->get('/links/edit',      [LinksController::class, 'edit']);
$router->put('/links/update',    [LinksController::class, 'update']);
