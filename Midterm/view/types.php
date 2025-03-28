<?php if ($error): ?>
<div class="alert">
    <?= $error; ?>
</div>
<?php endif; ?>

<table>
    <tr>
        <th>Types</th>
    </tr>
<?php foreach ($types as $type): ?>
    <tr>
        <td><?= $type['type'] ?></td>
        <td><button onclick="window.location.href = '?action=delete_type&id=<?= $type['id'] ?>'">Delete</button></td>
    </tr>
<?php endforeach; ?>
</table>