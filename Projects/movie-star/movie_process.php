<?php

    require_once("helpers/globals.php");
    require_once("helpers/db.php");
    require_once("models/Movie.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");
    require_once("dao/MovieDAO.php");

    $message = new Message($BASE_URL);
    $userDao = new UserDAO($conn, $BASE_URL);
    $movieDao = new MovieDAO($conn, $BASE_URL);

    $type = $_POST['type'] ?? null;

    $userData = $userDao->verifyToken(true);

    if($type == "create") {

        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $trailer = filter_input(INPUT_POST, 'trailer', FILTER_SANITIZE_STRING);
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        $length = filter_input(INPUT_POST, 'length');

        $movie = new Movie();

        if(!empty($title) && !empty($description) && !empty($category)) {

            $movie->title = $title;
            $movie->description = $description;
            $movie->trailer = $trailer;
            $movie->category = $category;
            $movie->length = $length;
            $movie->users_id = $userData->id;

            if(isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {
                $image = $_FILES["image"];
                $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
                $jpgArray = ["image/jpeg", "image/jpg"];

                if(in_array($image["type"], $imageTypes)) {

                    if(in_array($image["type"], $jpgArray)) {

                        $imageFile = imagecreatefromjpeg($image["tmp_name"]);
                    } else {

                        $imageFile = imagecreatefrompng($image["tmp_name"]);

                    }
                } else {

                    $message->setMessage("Formato de imagem inválido, por favor use jpg, jpeg ou png", "error", "back");

                }

                $imageName = $movie->generateImageName();

                imagejpeg($imageFile, "./img/movies/" . $imageName, 100);

                $movie->image = $imageName;
            }

            $movieDao->create($movie);

        } else {

            $message->setMessage("Você precisa preencher título e descrição", "error", "back");

        }

        
    }

?>