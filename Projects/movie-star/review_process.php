<?php

    require_once("helpers/globals.php");
    require_once("helpers/db.php");
    require_once("models/Movie.php");
    require_once("models/Review.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");
    require_once("dao/MovieDAO.php");
    require_once("dao/ReviewDAO.php");

    $message = new Message($BASE_URL);
    $userDAO = new UserDAO($conn, $BASE_URL);
    $movieDAO = new MovieDAO($conn, $BASE_URL);
    $reviewDAO = new ReviewDAO($conn, $BASE_URL);

    $type = filter_input(INPUT_POST, "type");

    $userData = $userDAO->verifyToken();

    if($type === "create") {

        $rating = filter_input(INPUT_POST, "rating");
        $review = filter_input(INPUT_POST, "review");
        $movies_id = filter_input(INPUT_POST, "movies_id");

        $reviewModel = new Review();

        $movieData = $movieDAO->findById($movies_id);

        if($movieData) {

            if(!empty($rating) && !empty($review) && !empty($movies_id)) {

                $reviewModel->rating = $rating;
                $reviewModel->review = $review;
                $reviewModel->users_id = $userData->id;
                $reviewModel->movies_id = $movies_id;

                //Insert review 
                $reviewDAO->create($reviewModel);

                $message->setMessage("Avaliação cadastrada com sucesso!", "success", "movie.php?id=".$movies_id);

            } else {

                $message->setMessage("Preencha a nota e comentário!", "error", "index.php");

            }

        } else {

            $message->setMessage("Filme não encontrado", "error", "index.php");

        }

    } else {

        $message->setMessage("Informações inválidas", "error", "index.php");

    }

?>