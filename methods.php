<?php
session_start();
include "controllers/controllers.inc.php";
$method = isset($_GET["action"]) ? $_GET["action"] : $_POST["action"];

switch ($method) {
    case "Login":
        User::Login($_POST);
        header("Location: " . $_SERVER["HTTP_REFERER"]);

        break;
    case "register":
        User::Register($_POST);
        header("Location: " . $_SERVER["HTTP_REFERER"]);

        break;
    case "Logout":
        User::Logout();
        header("Location: " . $_SERVER["HTTP_REFERER"]);

        break;
    case "add_post":
        Posts::add($_POST);
        header("Location: " . $_SERVER["HTTP_REFERER"]);

        break;
    case "delete":
        Posts::delete($_GET["pid"]);
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        break;
    case "edit":
        Posts::edit($_POST);
        header("Location: " . $_SERVER["HTTP_REFERER"]);

        break;
    case "comment":
        Comment::add($_POST);
        header("Location: " . $_SERVER["HTTP_REFERER"]);

        break;
    case "reply":
        Comment::reply($_POST);
        header("Location: " . $_SERVER["HTTP_REFERER"]);

        break;
    case "change_pass":
        User::Change_Pass($_POST);
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        break;
    case "image":
        print_r(Image::add($_FILES));
        break;
}
// die();
// header("Location: ".$_SERVER["HTTP_REFERER"]);
