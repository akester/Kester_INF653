<?php if ($error): ?>
<div class="alert">
    <?= $error; ?>
</div>
<?php endif; ?>

<form method="post" action="/admin/?action=add_type">
    <input type="text" name="type" placeholder="Type">
    <button type="submit">Submit</button>
</form>