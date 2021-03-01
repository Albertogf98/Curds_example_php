<?php
require_once( __DIR__ . "/../models/Book.php");
$book = new Book($_POST["id"], $_POST["title"], $_POST["description"], $_POST["pages"], "", "");
$book->update();
header("Location: ../index.php");
?>
