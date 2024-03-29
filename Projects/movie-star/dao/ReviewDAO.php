<?php

    require_once("models/Review.php");
    require_once("models/Message.php");

    require_once("dao/UserDAO.php");

    class ReviewDAO implements ReviewDAOInterface {

        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;

            $this->message = new Message($url);
        }
        public function buildReview($data) {
            $reviewObject = new Review();

            $reviewObject->id = $data["id"] ?? 0;
            $reviewObject->rating = $data["rating"];
            $reviewObject->review = $data["review"];
            $reviewObject->users_id = $data["users_id"];
            $reviewObject->movies_id = $data["movies_id"];

            return $reviewObject;
        }

        public function create(Review $review) {
            $stmt = $this->conn->prepare("INSERT INTO 
                reviews (rating, review, users_id, movies_id) 
                VALUES (:rating, :review, :users_id, :movies_id)");

            $stmt->bindParam(":rating", $review->rating);
            $stmt->bindParam(":review", $review->review);
            $stmt->bindParam(":users_id", $review->users_id);
            $stmt->bindParam(":movies_id", $review->movies_id);

            $stmt->execute();

            $this->message->setMessage("Avaliação cadastrada com sucesso!", "success", "index.php");
        }
        
        public function getMoviesReviews($id) {
            $reviews = [];

            $userDao = new UserDAO($this->conn, $this->url);

            $stmt = $this->conn->prepare("SELECT * FROM reviews WHERE movies_id = :id");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $data = $stmt->fetchAll();   

                foreach($data as $review) {
                    $reviewObj = $this->buildReview($review);

                    $user = $userDao->findById($reviewObj->users_id);

                    $reviewObj->user = $user;

                    array_push($reviews, $reviewObj);
                }
            } else {
                return [];
            }

            return $reviews;
        }

        public function hasAlreadyReviewed($id, $userId) {
            $stmt = $this->conn->prepare("SELECT * FROM reviews WHERE movies_id = :id AND users_id = :users_id");

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":users_id", $userId);

            $stmt->execute();

            if($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }   

        public function getRatings($id) {
            $stmt = $this->conn->prepare("SELECT rating FROM reviews WHERE movies_id = :id");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $data = $stmt->fetchAll();

                $ratings = [];

                foreach($data as $rating) {
                    array_push($ratings, $rating["rating"]);
                }

                return array_sum($ratings) / count($ratings);
            } else {
                return 0;
            }
        }
    }

?>