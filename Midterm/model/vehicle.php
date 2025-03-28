<?php

function get_vehicles($sort = 'price', $order = 'desc', $make = '', $type = '', $class = '')
{
    global $db;

    $query = <<<EOT
SELECT * FROM vehicles
    INNER JOIN makes ON vehicles.make_id = makes.id
    INNER JOIN types ON vehicles.type_id = types.id
    INNER JOIN classes ON vehicles.class_id = classes.id

EOT;

    switch($sort) {
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
    }elseif ($type) {
        $query .= "WHERE type_id = :type" . $order_clause;
        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type, PDO::PARAM_INT);
    }elseif ($class) {
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
