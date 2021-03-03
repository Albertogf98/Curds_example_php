<?php
require_once(__DIR__ . "/../../vendor/autoload.php");

if (!empty($_POST["email"]) && !empty($_POST["password"])) {

    $new = new \Models\User("", $_POST["name"], $_POST["email"], $_POST["password"]);
    $new->insert();
    header("Location: ../index.php");

} else {
    require_once( __DIR__ . "/../views/singupView.php");
}
?>
