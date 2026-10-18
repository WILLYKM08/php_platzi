<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title><?= $title ?? 'SWILBOT' ?></title>
</head>
<body>
  <nav class="bg-white shadow-md dark:bg-gray-900">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      
      <!-- LADO IZQUIERDO: Logotipo y Enlaces Principales -->
      <div class="flex items-center space-x-8">
        <!-- Logotipo -->
        <a href="#" class="text-xl font-bold text-indigo-600 dark:text-indigo-400">
          MiLogo
        </a>
        
        <!-- Enlaces de navegación (Escritorio) -->
        <?php partials('navbar'); ?>
      </div>

      <!-- LADO DERECHO: Botones de Autenticación (Escritorio) -->
      <div class="hidden md:flex items-center space-x-4">
        <!-- Botón de Iniciar Sesión (Simple) -->
        <?php if(isAuthenticated()): ?>
          <form action="/logout" method="POST">                
            <button type="submit" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium cursor-pointer">
                Cerrar sesión
            </button>
          </form>
        <?php else: ?>
        <a href="/login" class="text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-white transition-colors">
          Iniciar sesión
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  </nav>

  <div class="container mx-auto p-4">