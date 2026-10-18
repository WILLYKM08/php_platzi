<?php $errors = validator()->errors(); ?>

<?php if (!empty($errors)): ?>
    <ul class="mt-4 text-red-500">
        <?php foreach ($errors as $error): ?>
            <li class="text-xs">&rarr; <?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>