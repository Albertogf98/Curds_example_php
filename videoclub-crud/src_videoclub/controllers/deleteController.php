<?php
require_once( __DIR__ . "/../models/Movie.php");
Movie::delete($_GET["id"]);
header("Location: ../index.php");
?>
