<?php

    require_once("helpers/globals.php");
    require_once("helpers/db.php");
    require_once("models/Movie.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");
    require_once("dao/MovieDAO.php");

    $message = new Message($BASE_URL);

    $type = $_POST['type'] ?? null;

    if($type == "create") {
        
    }

?>