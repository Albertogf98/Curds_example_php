<?php
require_once( __DIR__ . "/../models/Client.php");
if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    $newClient = new Client("", $_POST["email"], $_POST["password"]);
    $newClient->insert();
    header("Location: ../index.php");
} else {
    require_once( __DIR__ . "/../views/singupView.php");
}
?>
