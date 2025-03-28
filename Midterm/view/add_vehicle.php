<?php if ($error): ?>
    <div class="alert">
        <?= $error; ?>
    </div>
<?php endif; ?>

<form method="post" action="/admin/?action=add_vehicle">
    <select name="make_id">
        <option value="">Make</option>
        <?php foreach ($makes as $make): ?>
            <option <?php if ($make_id == $make['id']) {echo 'selected'; } ?> value="<?= $make['id'] ?>"><?= $make['make'] ?></option>
        <?php endforeach; ?>
    </select>

    <select name="class_id">
        <option value="">Class</option>
        <?php foreach ($classes as $id => $class): ?>
            <option <?php if ($class_id == $class['id']) {echo 'selected'; } ?> value="<?= $class['id'] ?>"><?= $class['class'] ?></option>
        <?php endforeach; ?>
    </select>

    <select name="type_id">
        <option value="">Type</option>
        <?php foreach ($types as $id => $type): ?>
            <option <?php if ($type_id == $type['id']) {echo 'selected'; } ?> value="<?= $type['id'] ?>"><?= $type['type'] ?></option>
        <?php endforeach; ?>
    </select>

    <div>
        <input type="text" name="year" placeholder="Year" value="<?= $year ?>">
    </div>
    <div>
        <input type="text" name="model" placeholder="Model" value="<?= $model ?>">
    </div>
    <div>
        <input type="text" name="price" placeholder="Price" value="<?= $price ?>">
    </div>

    <button type="submit">Submit</button>
</form>