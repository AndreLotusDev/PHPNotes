<?php

    require_once("helpers/globals.php");
    require_once("helpers/db.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");

    $message = new Message($BASE_URL);
    
    $flash_message = $message->getMessage();

    if(!empty($flash_message["msg"])) {
        $message->clearMessage();
    }

    $userDAO = new UserDAO($conn, $BASE_URL);

    $userData = $userDAO->verifyToken(false);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Star</title>
    <!-- Short Icon -->
    <link rel="short icon" href="img/moviestar.ico" type="image/x-icon">
    <!-- CSS -->
</head>

<body>
    <!-- BOOTSTRAP TWITTER -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"
        integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css"
        integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/styles.css">

    <header>
        <nav class="navbar navbar-expand-lg" id="main-navbar">
            <a href="<?= $BASE_URL ?>" class="navbar-brand">
                <img id="logo" src="<?= $BASE_URL ?>img/logo.svg" alt="Movie Star">
                <span id="moviestar-title">MovieStar</span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <form action="<?= $BASE_URL ?>search.php" method="GET" id="search-form" class="form-inline my-2 my-lg-0">

                <input type="text" name="q" id="search" class="form-control mr-sm-2" type="search" placeholder="Search"
                    aria-label="Search">

                <button class="btn my-2 my-sm-0" type="submit">
                    <i class="fas fa-search"></i>
                </button>

            </form>

            <div class="collapse navbar-collapse" id="navbar">

                <ul class="navbar-nav">
                    <?php if($userData) : ?>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>newmovie.php" class="nav-link">
                                <i class="fas fa-plus"></i> Incluir Novo Filme
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>dashboard.php" class="nav-link">
                                Meus Filmes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>editprofile.php" class="nav-link bold">
                                <?= $userData->name ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>logout.php" class="nav-link">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>auth.php" class="nav-link">Entrar / Cadastrar</a>
                        </li>
                    <?php endif; ?>
                </ul>

            </div>
        </nav>
    </header>
    <?php if (!empty($flash_message)): ?>
        <div class="msg-container">
            <p class="msg <?= $flash_message["type"] ?>"><?= $flash_message["msg"] ?></p>
        </div>
    <?php endif; ?>
    