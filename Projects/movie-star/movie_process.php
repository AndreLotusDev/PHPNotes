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

        
    } else if($type == "deleted") {

        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

        $movie = $movieDao->findById($id);

        if($movie) {

            if($movie->users_id == $userData->id) {

                $movieDao->destroy($id);

            } else {

                $message->setMessage("Você não tem permissão para deletar este filme", "error", "index.php");

            }

        } else {

            $message->setMessage("Informações inválidas", "error", "index.php");

        }

    } else if($type == "update") {

        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $trailer = filter_input(INPUT_POST, 'trailer', FILTER_SANITIZE_STRING);
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        $length = filter_input(INPUT_POST, 'length');
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        $movieData = $movieDao->findById($id);
        $movie = $movieDao->findById($id);

        if($movieData) {

            if($movie->users_id == $userData->id) {
                
                if(!empty($title) && !empty($description) && !empty($category)) {
                    
                    $movieData->title = $title;
                    $movieData->description = $description;
                    $movieData->trailer = $trailer;
                    $movieData->category = $category;
                    $movieData->length = $length;

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
                        
                        $movie = new Movie();
                        $imageName = $movie->generateImageName();
        
                        imagejpeg($imageFile, "./img/movies/" . $imageName, 100);
        
                        $movieData->image = $imageName;
                    }

                    $movieDao->update($movieData);

                } else {

                    $message->setMessage("Você precisa preencher título, descrição e categoria", "error", "back");

                }
                
            } else {

                $message->setMessage("informações inválidas", "error", "index.php");

            }

        }

    } else {
            
        $message->setMessage("Ação inválida", "error", "index.php");

    }
?>