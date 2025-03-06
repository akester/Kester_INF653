<?php
$dsn = "mysql:host=127.0.0.1; dbname=assignment_tracker";
$username = 'root';
$password = 'pa55word';


try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Database connection is failed");
}
