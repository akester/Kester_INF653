<?php

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
