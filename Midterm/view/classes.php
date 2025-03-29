<h1>Vehicle Classes</h1>

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

<ul>
    <li><a href="?action=home">Admin Home</a></li>
    <li><a href="?action=add_class_form">Add Class</a></li>
</ul>
