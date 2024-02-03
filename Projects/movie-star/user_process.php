<?php

    require_once("helpers/globals.php");
    require_once("helpers/db.php");
    require_once("models/user.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");

    $message = new Message($BASE_URL);

    $userDao = new UserDAO($conn, $BASE_URL);

    $type = filter_input(INPUT_POST, "type");

    if($type === "update") {

        $userData = $userDao->verifyToken();

        $name = filter_input(INPUT_POST,"name");
        $lastaname = filter_input(INPUT_POST,"lastname");
        $email = filter_input(INPUT_POST,"email");
        $bio = filter_input(INPUT_POST,"bio");

        $user = new User();

        $user->setUsername = $name;
        $user->lastname = $lastaname;
        $userData->email = $email;
        $userData->bio = $bio;

        $userDao->update($userData);

    } else if($type === "changepassword") {



    } else {

        $message->setMessage("Ação inválida", "error", "index.php");

    }

?>