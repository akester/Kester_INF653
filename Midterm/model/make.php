<?php

function get_makes() {
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