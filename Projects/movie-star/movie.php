<?php

    require_once("templates/header.php");
    require_once("models/Movie.php");
    require_once("dao/ReviewDAO.php");
    require_once("dao/MovieDAO.php");

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    $movieDao = new MovieDAO($conn, $BASE_URL);
    $reviewDao = new ReviewDAO($conn, $BASE_URL);

    $movie = new Movie();

    if(empty($id)) {

        $message->setMessage("Filme não encontrado", "error", "index.php");

    } else {

        $movie = $movieDao->findById($id);

        if(!$movie) {
            $message->setMessage("Filme não encontrado", "error", "index.php");
        }

    }

    $movieReviews = $reviewDao->getMoviesReviews($id);

    if($movie->image == "") {
        $movie->image = "movie_cover.jpg";
    }

    $userOwnsMovie = false;

    if(!empty($userData) && $userData->id === $movie->users_id) {
        $userOwnsMovie = true;
    }

    $alreadyReviewed = false;
    if(!empty($userData)) {
        $alreadyReviewed = $reviewDao->hasAlreadyReviewed($movie->id, $userData->id);
    }
?>
<div id="main-container" class="container-fluid">
    <div class="row">
        <div class="offset-md-1 col-md-6 movie-container">
            <h1 class="page-title"><?= $movie->title ?></h1>
            <p class="movie-details">
                <span>Duração: <?= $movie->length ?></span>
                <span class="pipe"></span>
                <span><i class="fas fa-star"></i><?= $movie->rating ?></span>
            </p>
            <iframe 
                title="<?= $movie->title ?>"
                src="<?= $movie->trailer ?>" 
                width="560"
                height="315"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
            <p><?= $movie->description ?></p>
        </div>
        <div class="col-md-4">
            <div class="movie-image-container"
            style="background-image: url('<?= $BASE_URL ?>img/movies/<?=$movie->image?>')">>
            </div>
        </div>
        <div class="offset-md-1 col-md-10" id="reviews-container">
            <h3 id="reviews-title">Avaliações:</h3>
            <div class="col-md-12" id="review-form-container">
                <?php if(!empty($userData) && (!$userOwnsMovie && !$alreadyReviewed)): ?>
                <h4>Envie sua avaliação</h4>
                <p class="page-description">Preencha o formulário com a nota e comentário sobre o filme</p>
                <form action="<?= $BASE_URL ?>review_process.php" id="review-form-id" method="POST">
                    <input type="hidden" name="type" value="create">
                    <input type="hidden" name="movies_id" value="<?= $movie->id ?>">
                    <div class="form-group">
                        <label for="rating">Nota:</label>
                        <select name="rating" id="rating" class="form-control">
                            <option value="">Selecione a nota</option>
                            <option value="10">10 Estrelas</option>
                            <option value="9">9 Estrelas</option>
                            <option value="8">8 Estrelas</option>
                            <option value="7">7 Estrelas</option>
                            <option value="6">6 Estrelas</option>
                            <option value="5">5 Estrelas</option>
                            <option value="4">4 Estrelas</option>
                            <option value="3">3 Estrelas</option>
                            <option value="2">2 Estrelas</option>
                            <option value="1">1 Estrela</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="review">Seu comentário:</label>
                        <textarea name="review" id="review" rows="3" class="form-control"
                        placeholder="O que você achou do filme"></textarea>
                    </div>
                    <input type="submit" class="btn form-btn">
                </form>
                <?php endif; ?>
            </div>

            <!-- Comentários -->
            <?php foreach($movieReviews as $review): ?>
                <?php require("templates/user_review.php"); ?>
            <?php endforeach; ?>
            <?php if(empty($movieReviews)): ?>
                <p class="no-reviews">Nenhuma avaliação cadastrada</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
    require_once("templates/footer.php");
?>