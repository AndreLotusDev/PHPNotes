<?php

require_once("helpers/globals.php");
require_once("helpers/db.php");
require_once("models/User.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);
$userDao = new UserDao($conn, $BASE_URL);

$type = filter_input(INPUT_POST, "type");

if ($type === "register") {
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "last_name");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirmPassword = filter_input(INPUT_POST, "confirm_password");

    //Verify if fields are filled
    if (empty($name) || empty($lastname) || empty($email) || empty($password) || empty($confirmPassword)) {
        $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
    } else {
        if ($password === $confirmPassword) {

            //Verify if the email already exist in system
            if ($userDao->findByEmail($email) === false) {

                $user = new User();

                $userToken = $user->generateToken();
                $finalPassword = $user->generatePassword($password);

                $user->name = $name;
                $user->lastname = $lastname;
                $user->email = $email;
                $user->password = $finalPassword;
                $user->token = $userToken;

                $auth = true;

                $userDao->create($user, $auth);

            } else {
                $message->setMessage("Esse email já existe em nosso sistema!", "error", "back");
            }

        } else {
            $message->setMessage("As senhas não são iguais!", "error", "back");
        }
    }

} else if ($type === "login") {
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, "password");

    if ($userDao->authenticateUser($email, $password)) {
        $message->setMessage("Seja bem vindo!", "success", "editprofile.php");
    }
    else {
        $message->setMessage("Email ou senha incorretos!", "error", "back");
    }
} else {
    $message->setMessage("Internal server error.", "error","index.php");
}
?>