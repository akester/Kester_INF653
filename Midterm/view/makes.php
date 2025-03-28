<?php if ($error): ?>
<div class="alert">
    <?= $error; ?>
</div>
<?php endif; ?>

<table>
    <tr>
        <th>Make</th>
    </tr>
<?php foreach ($makes as $make): ?>
    <tr>
        <td><?= $make['make'] ?></td>
        <td><button onclick="window.location.href = '?action=delete_make&id=<?= $make['id'] ?>'">Delete</button></td>
    </tr>
<?php endforeach; ?>
</table>