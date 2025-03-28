<?php

function get_classes()
{
    global $db;

    $out = [];

    $query = 'SELECT * FROM classes';
    $statement = $db->prepare($query);
    $statement->execute();
    $out = $statement->fetchAll();
    $statement->closeCursor();

    return $out;
}

function add_class($class)
{
    global $db;
    $query = 'INSERT INTO classes (class) VALUES (:class)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $class, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
}

function delete_class($id)
{
    global $db;

    try {
        $query = 'DELETE FROM classes WHERE id = :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        throw new Exception("Cannot delete class with vehicles.");
    }
    return true;
}
