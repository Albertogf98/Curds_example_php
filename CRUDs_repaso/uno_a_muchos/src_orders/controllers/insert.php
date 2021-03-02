<?php
require_once( __DIR__ . "/../models/Order.php");
require_once( __DIR__ . "/../models/Client.php");
session_start();
$currentClient = Client::getByEmail($_SESSION["email"]);
if ($currentClient[0]->getEmail() === $_SESSION["email"]) {
    $newOrder = new Order("", $_POST["description"], "reparto", $currentClient[0]->getId());
    $orders = Order::getAll($_SESSION["email"]);
    $newOrder->insert();
    include_once( __DIR__ . "/../views/homeView.php");
    die();
}
?>