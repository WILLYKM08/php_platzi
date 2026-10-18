<div class="hidden md:flex space-x-4">
    <a href="/"       class="<?= isActive('/') ?> text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Inicio</a>
    <a href="/about"  class="<?= isActive('/about') ?> text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Acerca de</a>
    <a href="/links"  class="<?= isActive('/links') ?> text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Proyectos</a>
    <!  Puedo utilizar un arreglo de string en el parametro de la funcion 'isActive' si quiero que la pestaña
        se active con varias direcciones   ->        
</div>