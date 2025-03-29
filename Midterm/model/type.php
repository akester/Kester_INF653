<?php

// Get all vehicle types
function get_types()
{
    global $db;

    $out = [];

    try {
        $query = 'SELECT * FROM types';
        $statement = $db->prepare($query);
        $statement->execute();
        $out = $statement->fetchAll();
        $statement->closeCursor();
    } catch (PDOException $e) {
        throw new Exception($e);
    }

    return $out;
}

// Add a new vehicle types
function add_type($type)
{
    global $db;
    $query = 'INSERT INTO types (type) VALUES (:type)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type', $type, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
}

// Delete vehicle type
function delete_type($id)
{
    global $db;

    try {
        $query = 'DELETE FROM types WHERE id = :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        throw new Exception("Cannot delete type with active vehicles.");
    }
    return true;
}
