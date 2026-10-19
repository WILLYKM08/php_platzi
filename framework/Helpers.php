<?php

use Framework\Authenticate;
use Framework\Database;
use Framework\SessionManager;
use Framework\Validator;

if (!function_exists('rootPath')) {
    function rootPath(string $path): string {
      return dirname(__DIR__) . '/' . normalize_path($path);
    }
}

if (!function_exists('normalize_path')) {
  function normalize_path(string $path ): string
  {
    return trim ($path, '/');
  }
}



if(!function_exists('view')) {
  function view(string $view, array $data = []): void
  {
    extract($data);
    $filePath = rootPath("resources/{$view}.template.php");

    require $filePath;
  }
}

if (!function_exists('isActive')) {
    function isActive(string|array $paths): string 
    {
        $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ((array) $paths as $path) {
            $match = ($path === '/') 
                ? $currentUri === '/' 
                : str_starts_with($currentUri, $path);

            if ($match) {
                return 'bg-blue-900 text-white';
            }
        }

        return 'text-gray-300 hover:bg-gray-700 hover:text-white';
    }
}

if (!function_exists('old')) {
    function old(string $key, mixed $default = null): mixed 
    {
        $key = 'old_' . $key;

        return sessionManager()->getFlash($key, $default);
    }
}

if (!function_exists('config')) {
    function config(string $key, mixed $default=null): mixed 
    {
        $config = require rootPath('config/app.php');
        
        return $config[$key] ?? $default;
    }
}

if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed 
    {
        return $_ENV[$key] ?? $default;
    }
}

if (!function_exists('redirect')) {
    function redirect(string $uri, string|null $message = null, int $status = 302): void 
    {
        if($message) {
            sessionManager()->setFlash('message', $message);
        }

        http_response_code($status);
        header("Location: /" . normalize_path($uri));
        exit;
    }
}

if (!function_exists('db')) {
    function db(): Database
    {
        static $db = null;

        if ($db === null) {
            $db = new Database();
        }

        return $db;
    }
}

if (!function_exists('auth')) {
    function auth(): Authenticate
    {
        static $auth = null;

        if ($auth === null) {
            $auth = new Authenticate();
        }

        return $auth;
    }
}

if (!function_exists('validator')) {
    function validator(array $data = [], array $rules = []): Validator
    {
        static $validator = null;

        // Si no existe la instancia o se pasan nuevas reglas, se instancia/actualiza
        if ($validator === null || !empty($rules)) {
            $validator = new Validator($data, $rules);
        }

        return $validator;
    }
}

if (!function_exists('errors')) {
    function errors(): void
    {
        require rootPath('resources/partials/errors.php');
    }
}

if (!function_exists('partials')) {
    function partials(string $name, array $data = []): void
    {
        extract($data);
        $filePath = rootPath("resources/partials/{$name}.php");

        require $filePath;
    }
}

if (!function_exists('isAuthenticated')) {
    function isAuthenticated(): bool
    {
        return isset($_SESSION['user']);
    }
}

if (!function_exists('back')) {
    function back(): void
    {
        header('Location: ' . $_SERVER['HTTP_REFERER'] ?? '/');
        exit();
    }
}

if (!function_exists('sessionManager')) {
    function sessionManager(): SessionManager
    {
        static $sm = null;

        if ($sm === null) {
            $sm = new SessionManager();
        }

        return $sm;
    }
}