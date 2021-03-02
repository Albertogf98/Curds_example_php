<?php
require_once( __DIR__ . "/../models/Order.php");
require_once( __DIR__ . "/../models/Client.php");

session_start();
$currentClient = Client::getByEmail($_SESSION["email"]);

if ($currentClient[0]->getEmail() === $_SESSION["email"]) {
    $order = new Order($_POST["id"], $_POST["description"], $_POST["status"], $currentClient[0]->getId());
    $order->update();
    $orders = Order::getAll($_SESSION["email"]);
    header("Location: ../index.php");
}
?>