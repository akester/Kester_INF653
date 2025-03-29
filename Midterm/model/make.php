<?php

// Get all vehicle makes
function get_makes()
{
    global $db;

    $out = [];

    try {
        $query = 'SELECT * FROM makes';
        $statement = $db->prepare($query);
        $statement->execute();
        $out = $statement->fetchAll();
        $statement->closeCursor();
    } catch (PDOException $e) {
        throw new Exception($e);
    }

    return $out;
}

// Add a new make
function add_make($make)
{
    global $db;
    $query = 'INSERT INTO makes (make) VALUES (:make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
}

// Delete a make
function delete_make($id)
{
    global $db;

    try {
        $query = 'DELETE FROM makes WHERE id = :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        throw new Exception("Cannot delete make with active vehicles.");
    }
    return true;
}
