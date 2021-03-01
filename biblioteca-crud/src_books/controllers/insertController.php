<?php
require_once( __DIR__ . "/../models/Author.php");
require_once( __DIR__ . "/../models/Book.php");
$books = Book::getAll();
$authors = Author::getAll();
include_once( __DIR__ . "/../views/insertView.php");
?>

