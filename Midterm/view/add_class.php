<h1>Add Vehicle Class</h1>

<?php if ($error): ?>
<div class="alert">
    <?= $error; ?>
</div>
<?php endif; ?>

<form method="post" action="/admin/?action=add_class">
    <input type="text" name="class" placeholder="Class">
    <button type="submit">Submit</button>
</form>