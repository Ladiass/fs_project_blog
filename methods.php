<?php 
include "controllers/controllers.inc.php";
    $method = isset($_POST) ? $_POST["action"] : $_GET["action"];

    switch($method){
        case "Login":
            User::Login($_POST);
            break; 
        case "Logout":
            User::Logout();
            break;
    }
    header("Location: ".$_SERVER["HTTP_REFERER"]);