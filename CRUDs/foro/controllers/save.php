<?php

require_once( __DIR__ . "/../models/User.php");


$user = new User("", $_POST["name"],$_POST["user"], $_POST["password"], $_POST["email"]);
$user->insert();

header('Location: ../index.php');

?>
