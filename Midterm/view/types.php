<h1>Vehicle Types</h1>

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

<ul>
    <li><a href="?action=home">Admin Home</a></li>
    <li><a href="?action=add_type_form">Add Type</a></li>
</ul>