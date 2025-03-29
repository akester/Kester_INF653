<h1>Add Vehicle Make</h1>

<?php if ($error): ?>
<div class="alert">
    <?= $error; ?>
</div>
<?php endif; ?>

<form method="post" action="/admin/?action=add_make">
    <input type="text" name="make" placeholder="Make">
    <button type="submit">Submit</button>
</form>