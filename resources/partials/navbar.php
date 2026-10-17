<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl flex h-16 items-center justify-center">
        <div class="flex gap-4">
            <a href="/"       class="<?= isActive('/') ?> rounded-md px-3 py-2 text-sm font-medium">Inicio</a>
            <a href="/about"  class="<?= isActive('/about') ?> rounded-md px-3 py-2 text-sm font-medium">Acerca de</a>
            <a href="/links"  class="<?= isActive('/links') ?> rounded-md px-3 py-2 text-sm font-medium">Proyectos</a>
            <!  Puedo utilizar un arreglo de string en el parametro de la funcion 'isActive' si quiero que la pestaña
             se active con varias direcciones   ->        
        </div>
    </div>
</nav>