<?php
require_once( __DIR__ . "/../models/User.php");
$users = User::getAll();
require_once( __DIR__ . "/../views/home.php");
?>
