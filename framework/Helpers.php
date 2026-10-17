<?php

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
                return 'bg-gray-900 text-white';
            }
        }

        return 'text-gray-300 hover:bg-gray-700 hover:text-white';
    }
}

if (!function_exists('old')) {
    function old(string $key, ?string $default = ''): string 
    {
        $value = $_POST[$key] ?? $default ?? '';
        
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}