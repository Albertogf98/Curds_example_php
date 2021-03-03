<?php
require_once(__DIR__ . "/../../vendor/autoload.php");
session_start();

$currentUser = \Models\User::getByEmail($_SESSION["email"]);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($currentUser[0]->getEmail() == $_SESSION["email"]) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/images/" . $_FILES["image"]["name"]);
        $newOrder = new \Models\Order("", $_POST["description"], "reparto", $_FILES["image"]["name"], $currentUser[0]->getId());

        $newOrder->insert();
        header("Location: ../index.php");
    }
}

?>