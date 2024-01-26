<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "curso_php";

try {
    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        throw new Exception('Connection failed');
    }
} catch (Exception $e) {
    error_log($e->getMessage());

    echo "An error occurred while connecting to the database. Please try again later.";
}