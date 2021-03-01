<?php
require_once( __DIR__ . "/../models/User.php");
User::delete($_GET["id"]);
header("Location: ../index.php");
?>
