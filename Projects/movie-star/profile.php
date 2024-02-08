<?php
    require_once("templates/header.php");
    require_once("models/User.php");
    require_once("dao/userDAO.php");
    require_once("dao/MovieDAO.php");

    $user = new User();
    $userDao = new UserDAO($conn, $BASE_URL);
    $movieDao = new MovieDAO($conn, $BASE_URL);

    $id = filter_input(INPUT_GET, "id");

    if(empty($id)) {

        if($userData->id) {

            $id = $userData->id;

        } else {
            
            $message->setMessage("Usuário não encontrado", "error", "index.php");

        }

    } else {

        $userData = $userDao->findById($id);

        if(!$userData) {

            $message->setMessage("Usuário não encontrado", "error", "index.php");

        }

    }

    $fullName = $user->getFullName($userData);

    if($userData->image == "") {
        $userData->image = "user.png";
    }

    $movieDao = new MovieDAO($conn, $BASE_URL);

    $userMovies = $movieDao->getMoviesByUserId($id);

?>
    <div id="main-container" class="container-fluid">

        <div class="col-md-8 offset-md-2">

            <div class="row profile-container">

                <div class="col-md-12">

                    <h1 class="page-title" style="text-align: center;"><?= $fullName ?></h1>
                    <div id="profile-image-container" 
                        style="background-image: url('<?= $BASE_URL ?>img/users/<?= $userData->image ?>')"></div>
                    <h3 class="about-title">Sobre: </h3>

                    <?php if(!empty($userData->bio)): ?>
                        <p><?= $userData->bio ?></p>
                    <?php else: ?>
                        <p>Este usuário não adicionou uma biografia</p>
                    <?php endif; ?>
                </div>

                <div class="col-md-12 added-movies-container">

                    <h3>Filmes que enviou:</h3>

                    <?php foreach($userMovies as $movie): ?>

                        <?php require("templates/movie_card.php") ?>

                    <?php endforeach; ?>

                    <?php if(count($userMovies) == 0): ?>
                        <p class="empty-list">Este usuário não adicionou nenhum filme</p>
                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

<?php
    require_once("templates/footer.php");
?>