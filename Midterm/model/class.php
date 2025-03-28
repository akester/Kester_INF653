<?php

function get_classes() {
    global $db;

    $out = [];

    try {
        $query = 'SELECT * FROM classes';
        $statement = $db->prepare($query);
        $statement->execute();
        $out = $statement->fetchAll();
        $statement->closeCursor();
    } catch (PDOException $e) {
        throw new Exception($e);
    }

    return $out;
}