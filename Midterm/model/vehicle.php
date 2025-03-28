<?php

function get_vehicles($sort = 'price', $order = 'desc', $make = '', $type = '', $class = '')
{
    global $db;

    $query = <<<EOT
SELECT 
    vehicles.id as id,
    vehicles.model as model,
    vehicles.year as year,
    vehicles.price as price,
    makes.make as make,
    types.type as type,
    classes.class as class
FROM vehicles
    INNER JOIN makes ON vehicles.make_id = makes.id
    INNER JOIN types ON vehicles.type_id = types.id
    INNER JOIN classes ON vehicles.class_id = classes.id
EOT;

    switch ($sort) {
        case 'year':
            $order_clause = ' ORDER BY year DESC';
        case 'price':
        default:
            $order_clause = ' ORDER BY price DESC';
    }

    if ($make) {
        $query .= "WHERE make_id = :make" . $order_clause;
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make, PDO::PARAM_INT);
    } elseif ($type) {
        $query .= "WHERE type_id = :type" . $order_clause;
        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type, PDO::PARAM_INT);
    } elseif ($class) {
        $query .= "WHERE class_id = :class" . $order_clause;
        $statement = $db->prepare($query);
        $statement->bindValue(':class', $class, PDO::PARAM_INT);
    } else {
        $statement = $db->prepare($query);
    }

    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicle($id)
{
    global $db;

    $query = <<<EOT
SELECT 
    vehicles.id as id,
    vehicles.model as model,
    vehicles.year as year,
    vehicles.price as price,
    makes.make as make,
    types.type as type,
    classes.class as class
FROM vehicles
    INNER JOIN makes ON vehicles.make_id = makes.id
    INNER JOIN types ON vehicles.type_id = types.id
    INNER JOIN classes ON vehicles.class_id = classes.id
WHERE vehicles.id = :id
EOT;

    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    print_r($vehicles);
    return $vehicles[0];
}

function delete_vehicle($id)
{
    global $db;

    $query = 'DELETE FROM vehicles WHERE id = :id';

    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    $statement->execute();
    $statement->closeCursor();
    return true;
}

function add_vehicle($data) {
    global $db;
    $query = <<<EOT
INSERT INTO
    vehicles (make_id, class_id, type_id, model, year, price)
VALUES
    (:make_id, :class_id, :type_id, :model, :year, :price)
EOT;

    $statement = $db->prepare($query);

    $statement->bindValue(':make_id', $data['make_id'], PDO::PARAM_INT);
    $statement->bindValue(':class_id', $data['class_id'], PDO::PARAM_INT);
    $statement->bindValue(':type_id', $data['type_id'], PDO::PARAM_INT);
    $statement->bindValue(':model', $data['model'], PDO::PARAM_STR);
    $statement->bindValue(':year', $data['year'], PDO::PARAM_INT);
    $statement->bindValue(':price', $data['price'], PDO::PARAM_STR);

    $statement->execute();
    $statement->closeCursor();
}