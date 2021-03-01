<?php
require_once( __DIR__ . "/../models/User.php");
$newUser = new User("", $_POST["name"], $_POST["email"], $_POST["password"], $_POSE
["userType"]);

$newUser->insert();
header("Location: ../index.php");
