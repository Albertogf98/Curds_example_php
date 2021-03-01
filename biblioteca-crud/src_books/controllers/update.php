<?php
require_once( __DIR__ . "/../models/Book.php");
$book = Book::getById($_GET['id']);
require_once( __DIR__ . "/../views/updateView.php");
?>
