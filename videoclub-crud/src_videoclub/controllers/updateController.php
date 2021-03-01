<?php
require_once( __DIR__ . "/../models/Movie.php");
require_once( __DIR__ . "/../models/Gender.php");
$movies = Movie::getById($_GET["id"]);
$genders = Gender::getAll();
require_once( __DIR__ . "/../views/updateView.php");
?>