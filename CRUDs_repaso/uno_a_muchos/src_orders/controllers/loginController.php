<?php
require_once( __DIR__ . "/../models/Client.php");
require_once( __DIR__ . "/../models/Order.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $loginClient = Client::getByEmail($_POST["email"]);
    $orders = Order::getAll($_POST["email"]);

    if (empty($loginClient)) {
        require_once( __DIR__ . "/../views/loginView.php");

    } else if ($loginClient[0]->getEmail() === $_POST["email"] && $loginClient[0]->getPassword() === $_POST["password"]) {
            require_once( __DIR__ . "/../views/homeView.php");
            $_SESSION["email"] = $loginClient[0]->getEmail();
    }
    die();
}
include_once( __DIR__ . "/../views/loginView.php");
?>