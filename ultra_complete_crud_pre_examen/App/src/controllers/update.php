<?php
require_once(__DIR__ . "/../../vendor/autoload.php");
session_start();
$currentUser = \Models\User::getByEmail($_SESSION["email"]);
if (!empty($_FILES["image"]["name"])) {

    move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/".$_FILES['image']['name']);
    $order = new \Models\Order($_POST["id"], $_POST["description"], $_POST["status"],  $_FILES["image"]["name"], $currentUser[0]->getId());
} else {
    $order = new \Models\Order($_POST["id"], $_POST["description"], $_POST["status"],  $_POST["oldImage"], $currentUser[0]->getId());
}

$order->update();
header("Location: ../index.php");
?>
