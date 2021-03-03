<?php
require_once(__DIR__ . "/../../vendor/autoload.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $currentUser = \Models\User::getByEmail($_POST["email"]);
    $orders = \Models\Order::getAll($_POST["email"]);

    if (empty($currentUser)) {
        require_once(__DIR__ . "/../views/loginView.php");

    } elseif ($currentUser[0]->getEmail() === $_POST["email"] && $currentUser[0]->getPassword() === $_POST["password"]) {
        $_SESSION["email"] = $currentUser[0]->getEmail();
        require_once( __DIR__ . "/../controllers/homeController.php");
    }
    die();
}
include_once(__DIR__ . "/../views/loginView.php");

?>