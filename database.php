<?php
    $dsn = 'mysql:host=localhost;dbname=4300project';
    $username = 'root';
    $password = '';
    $conn = new mysqli("localhost", $username, $password, "4300project");

    try {
        $db = new PDO($dsn, $username, $password);
    }
    catch (PDOException $e){
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>