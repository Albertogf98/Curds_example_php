<?php
require_once( __DIR__ . "/../models/Movie.php");
require_once( __DIR__ . "/../models/Gender.php");
$movies = Movie::getAll();
require_once( __DIR__ . "/../views/homeView.php");
?>