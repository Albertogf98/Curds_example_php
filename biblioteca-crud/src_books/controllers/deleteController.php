<?php
require_once( __DIR__ . "/../models/Book.php");
Book::delete($_GET["id"]);
header("Location: ../index.php");
?>
