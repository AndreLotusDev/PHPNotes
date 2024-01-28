<?php 

    $db_name = "movie_star";
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";

    $conn = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);

    //Enable errors
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Enable emulated prepared statements
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false)
?>
