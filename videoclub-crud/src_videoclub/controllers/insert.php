<?php
require_once( __DIR__ . "/../models/Movie.php");
require_once( __DIR__ . "/../models/Gender.php");

$searchGender = Gender::getByName($_POST["gender"]);
$movie = new Movie("", $_POST["title"], $_POST["director"], $_POST["year"], $_POST["format"], $searchGender->getId());
$movie->insert();
header("Location: ../index.php");
?>