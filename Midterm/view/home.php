<h1>Zippy Used Autos</h1>

<select onchange="window.location.href = this.value">
    <option value="">Sort</option>
    <option value="?order=desc&sort=price">Price Desc</option>
    <option value="?order=desc&sort=year">Year Desc</option>
</select>

<select onchange="window.location.href = this.value">
    <option value="">Filter Make</option>
    <?php foreach ($makes as $make): ?>
        <option value="?make=<?= $make['id'] ?>"><?= $make['make'] ?></option>
    <?php endforeach; ?>
</select>

<select onchange="window.location.href = this.value">
    <option value="">Filter Class</option>
    <?php foreach ($classes as $id => $class): ?>
        <option value="?class=<?= $class['id'] ?>"><?= $class['class'] ?></option>
    <?php endforeach; ?>
</select>

<select onchange="window.location.href = this.value">
    <option value="">Filter Type</option>
    <?php foreach ($types as $id => $type): ?>
        <option value="?type=<?= $type['id'] ?>"><?= $type['type'] ?></option>
    <?php endforeach; ?>
</select>

<table>
    <tr>
        <th>Price</th>
        <th>Year</th>
        <th>Make</th>
        <th>Model</th>
        <th>Class</th>
        <th>Type</th>
    </tr>
<?php foreach ($vehicles as $vehicle): ?>
    <tr>
        <td><?= $vehicle['price'] ?></td>
        <td><?= $vehicle['year'] ?></td>
        <td><?= $vehicle['make'] ?></td>
        <td><?= $vehicle['model'] ?></td>
        <td><?= $vehicle['class'] ?></td>
        <td><?= $vehicle['type'] ?></td>
    </tr>
<?php endforeach; ?>
</table>