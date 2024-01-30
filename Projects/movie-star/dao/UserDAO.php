<?php

    require_once("models/User.php");
    require_once("models/Message.php");

    class UserDAO implements UserDAOInterface {

        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function buildUser($data){
            $user = new User();
            
            $user->id = $data["id"];
            $user->name = $data["name"];
            $user->lastname =  $data["lastname"];
            $user->email = $data["email"];
            $user->password = $data["password"];
            $user->image = $data["image"];
            $user->bio = $data["bio"];
            $user->token = $data["token"];

            return $user;
        }
        public function create(User $user, $authUser = false) {
            $stmt = $this->conn->prepare("INSERT INTO users(
                name, last_name, email, password, token) VALUES(
                    :name, :last_name, :email, :password, :token
                )");

            $stmt->bindParam(":name", $user->name, PDO::PARAM_STR);
            $stmt->bindParam(":last_name", $user->lastname, PDO::PARAM_STR);
            $stmt->bindParam(":email", $user->email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $user->password, PDO::PARAM_STR);
            $stmt->bindParam(":token", $user->token, PDO::PARAM_STR);

            $stmt->execute();

            if($authUser) {
                $this->setTokenToSession($user->token, true);
            }
        }
        public function update(User $user) {

        }
        public function findByToken($token) {

        }
        public function verifyToken($protected = false) {

        }
        public function setTokenToSession($token, $redirect = true) {

            $_SESSION["token"] = $token;

            if($redirect) {
                $this->message->setMessage("Você foi autenticado com sucesso!", "success", "editprofile.php");
            }

        }
        public function authenticateUser($email, $password) {

        }
        public function findByEmail($email) {
            if($email != "") {
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");

                $stmt->bindParam("email", $email);

                $stmt->execute();

                if($stmt->rowCount() > 0) {

                    $data = $stmt->fetch();
                    $user = $this->buildUser($data);

                    return $user;

                } else {
                    return false;
                }
            }
        }
        public function changePassword(User $user) {

        }
    }
?>