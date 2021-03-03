<?php
require_once(__DIR__ . "/../../vendor/autoload.php");


session_start();
\Models\Order::updateEnum($_GET["id"]);
$currentUser = \Models\User::getByEmail($_SESSION["email"]);

if ($currentUser[0]->getEmail() === $_SESSION["email"]) {
    $orders = \Models\Order::getAll($_SESSION["email"]);
    include_once( __DIR__ . "/../views/homeView.php");
}
?>
