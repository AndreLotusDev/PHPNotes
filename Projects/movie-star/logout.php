<?php

    require_once("templates/header.php");   

    if($userDAO != null) {
        $userDAO->destroyToken();
    }

?>