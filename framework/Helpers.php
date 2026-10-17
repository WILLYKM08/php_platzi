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
