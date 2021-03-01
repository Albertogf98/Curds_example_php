<?php
require_once( __DIR__ . "/../models/Book.php");
require_once( __DIR__ . "/../models/Author.php");
$books = Book::getAll();
require_once( __DIR__ . "/../views/home.php");
?>
