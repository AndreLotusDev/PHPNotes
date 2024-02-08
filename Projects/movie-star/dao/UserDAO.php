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
            $user->lastname =  $data["last_name"];
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

            $stmt->bindParam(":name", $user->name);
            $stmt->bindParam(":last_name", $user->lastname);
            $stmt->bindParam(":email", $user->email);
            $stmt->bindParam(":password", $user->password);
            $stmt->bindParam(":token", $user->token);

            $stmt->execute();

            if($authUser) {
                $this->setTokenToSession($user->token, true);
            }
        }
        public function update(User $user, $redirect = true) {
            $stmt = $this->conn->prepare("UPDATE USERS SET 
                name = :name, last_name = :last_name, email = :email, 
                password = :password, token = :token, image = :image
                WHERE id = :id");

            $stmt->bindParam("name", $user->name, PDO::PARAM_STR);
            $stmt->bindParam("last_name", $user->lastname, PDO::PARAM_STR);
            $stmt->bindParam("email", $user->email, PDO::PARAM_STR);
            $stmt->bindParam("token", $user->token, PDO::PARAM_STR);
            $stmt->bindParam("password", $user->password, PDO::PARAM_STR);
            $stmt->bindParam("id", $user->id, PDO::PARAM_STR);
            $stmt->bindParam("image", $user->image, PDO::PARAM_STR);

            $stmt->execute();

            if($redirect) {
                $this->message->setMessage("Dados atualizados com sucesso!", "success", "editprofile.php");
            }
        }
        public function findByToken($token) {
            if($token != "") {
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");

                $stmt->bindParam("token", $token);

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
        public function verifyToken($protected = false) {

            if(!empty($_SESSION["token"])) {

                $token = $_SESSION["token"];

                $user = $this->findByToken($token);

                if ($user) {
                    return $user;
                } elseif($protected) {

                    $this->message->setMessage("Faça a autenticação para acessar esta página!", "error",
                    "index.php");
                    
                }
            } elseif($protected) {

                $this->message->setMessage("Faça a autenticação para acessar esta página!", "error",
                "index.php");
                
            } 
            else {
                return false;
            }

        }
        public function setTokenToSession($token, $redirect = true) {

            $_SESSION["token"] = $token;

            if($redirect) {
                $this->message->setMessage("Você foi autenticado com sucesso!", "success", "editprofile.php");
            }

        }
        public function authenticateUser($email, $password) {
            $user = new User();

            $user = $this->findByEmail($email);

            if($user) {

                if(password_verify($password, $user->password)) {

                    $token = $user->generateToken();

                    $this->setTokenToSession($token, false);

                    $user->token = $token;

                    $this->update($user);

                    return true;

                } 
            }
            
            return false;
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

            $stmt = $this->conn->prepare("UPDATE users SET password = :password WHERE id = :id");

            $stmt->bindParam("password", $user->password);
            $stmt->bindParam("id", $user->id);

            $stmt->execute();

            $this->message->setMessage("Senha alterada com sucesso!", "success", "editprofile.php");

        }

        public function destroyToken() {
            $_SESSION["token"] = "";

            $this->message->setMessage("Deslogado!","success","index.php");
        }

        public function findById($id) {
            if($id != "") {
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");

                $stmt->bindParam("id", $id);

                $stmt->execute();

                if($stmt->rowCount() > 0) {

                    $data = $stmt->fetch();
                    $user = $this->buildUser($data);

                    return $user;

                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
?>