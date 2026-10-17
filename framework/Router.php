<?php

namespace Framework;

class Router
{
  protected $routes = [];

  public function __construct()
  {
    $this->loadRoutes('web');
  }

  protected function loadRoutes($routeFile)
  {
    $router = $this;
    $filePath = __DIR__ . "/../routes/$routeFile.php";
    require $filePath;
  }

  public function run ()
  {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];//GET or POST or DELETE

    $action = $this->routes[$method][$uri] ?? null;

    // echo '<pre>';
    // var_dump($this->routes);
    // die();

    if(!$action) {
      http_response_code(404);
      echo 'Página no encontrada';
      exit;
    }

    [$controller, $method] = $action;
    (new $controller)->$method();
  }

  public function get($uri, $action)
  {
    $this->routes['GET'][$uri] = $action;
  }

  public function post($uri, $action)
  {
    $this->routes['POST'][$uri] = $action;
  }

  public function delete($uri, $action)
  {
    $this->routes['DELETE'][$uri] = $action;
  }

  public function put($uri, $action)
  {
    $this->routes['PUT'][$uri] = $action;
  }
}