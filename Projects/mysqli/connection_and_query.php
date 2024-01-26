<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "curso_php";

try {
    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $selectSqlInPostTable = "SELECT * FROM posts";
    $result = $conn->query($selectSqlInPostTable);

    if ($result->num_rows > 0) {
        echo "
        <table style='width:100%; text-align:left;'>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
            </tr>";
    
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["title"] . "</td>
                <td>" . $row["content"] . "</td>
            </tr>";
        }
    
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
} catch (Exception $e) {
    error_log($e->getMessage());

    echo "An error occurred while connecting to the database. Please try again later.";
}