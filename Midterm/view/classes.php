<?php if ($error): ?>
<div class="alert">
    <?= $error; ?>
</div>
<?php endif; ?>

<table>
    <tr>
        <th>Classes</th>
    </tr>
<?php foreach ($classes as $class): ?>
    <tr>
        <td><?= $class['class'] ?></td>
        <td><button onclick="window.location.href = '?action=delete_class&id=<?= $class['id'] ?>'">Delete</button></td>
    </tr>
<?php endforeach; ?>
</table>