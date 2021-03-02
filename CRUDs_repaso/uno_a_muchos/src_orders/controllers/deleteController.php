<?php
require_once( __DIR__ . "/../models/Order.php");
require_once( __DIR__ . "/../models/Client.php");

session_start();
Order::delete($_GET["id"]);
$loginClient = Client::getByEmail($_SESSION["email"]);

if ($loginClient[0]->getEmail() === $_SESSION["email"]) {
    $orders = Order::getAll($_SESSION["email"]);
    include_once( __DIR__ . "/../views/homeView.php");
}
?>
