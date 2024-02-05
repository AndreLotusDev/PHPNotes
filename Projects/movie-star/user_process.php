<?php

require_once("helpers/globals.php");
require_once("helpers/db.php");
require_once("models/user.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);

$userDao = new UserDAO($conn, $BASE_URL);

$type = filter_input(INPUT_POST, "type");

if ($type === "update") {

    $userData = $userDao->verifyToken();

    $name = filter_input(INPUT_POST, "name");
    $lastaname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $bio = filter_input(INPUT_POST, "bio");

    $user = new User();

    $user->setUsername = $name;
    $user->lastname = $lastaname;
    $userData->email = $email;
    $userData->bio = $bio;

    if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {

        $image = $_FILES["image"];

        // Checando tipo da imagem
        if (in_array($image["type"], ["image/jpeg", "image/jpg", "image/png"])) {

            // Checa se é jpg
            if (in_array($image["type"], ["image/jpeg", "image/jpg"])) {
                $imageFile = imagecreatefromjpeg($image["tmp_name"]);
            } else {
                $imageFile = imagecreatefrompng($image["tmp_name"]);
            }

            $imageName = $user->generateImageName();

            imagejpeg($imageFile, "./img/users/" . $imageName, 100);

            $userData->image = $imageName;

        } else {
            $message->setMessage("Tipo inválido de imagem, envie jpg ou png!", "error", "editprofile.php");
        }

    }

    $userDao->update($userData);

} else if ($type === "changepassword") {

    $password = filter_input(INPUT_POST, "password");
    $confirmPassword = filter_input(INPUT_POST, "confirmpassword");
    $id = filter_input(INPUT_POST, "id");

    if ($password == $confirmPassword) {

        $user = new User();

        $finalPassword = password_hash($password, PASSWORD_DEFAULT);

        $user->password = $finalPassword;
        $user->id = $id;

        $userDao->changePassword($user);

    } else {

        $message->setMessage("As senhas não são iguais.", "error", "editprofile.php");

    }

} else {

    $message->setMessage("Ação inválida", "error", "index.php");

}

?>