<?php
    $dsn = 'mysql:host=localhost;dbname=prodApp';
    $username = 'will';
    $password = '1234';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>