<?php
require_once( __DIR__ . "/../models/User.php");

$user = new User($_POST["id"], $_POST["name"],$_POST["user"], $_POST["password"], $_POST["email"]);

$user->update();
header("Location: ../index.php");
?>