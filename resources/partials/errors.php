<?php $errors = sessionManager()->getFlash('errors') ?? []; ?>
<?php if(!is_array($errors)) : $errors=[$errors]; ?>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <ul class="mt-4 text-red-500">
        <?php foreach ($errors as $error): ?>
            <li class="text-xs">&rarr; <?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>