<?php
require_once( __DIR__ . "/../models/Movie.php");
require_once( __DIR__ . "/../models/Gender.php");

if (empty($_POST["year"]) || empty($_POST["format"]) || empty($_POST["gender"])) {
    $movie = new Movie($_POST["id"], $_POST["title"], $_POST["director"], $_POST["oldYear"], $_POST["oldFormat"], $_POST["oldGenderId"]);
} else {
    $searchGender = Gender::getByName($_POST["gender"]);
    $movie = new Movie($_POST["id"], $_POST["title"], $_POST["director"], $_POST["year"], $_POST["format"], $searchGender->getId());
}

$movie->update();
header("Location: ../index.php");
?>
