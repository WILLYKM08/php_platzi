<?php $alert = sessionManager()->getFlash('message'); ?>
<?php if($alert): ?>
<div class="bg-blue-100 border border-blue-400 text-blue-700 text-xs px-2 py-1 rounded mb-4">
    <strong class="font-bold">&rarr;</strong>
    <?= $alert ?>
</div>
<?php endif; ?>