<?php

require_once( __DIR__ . "/../models/Book.php");
require_once( __DIR__ . "/../models/Author.php");
$author = new Author("", $_POST["author"], $_POST["surname"], $_POST["age"]);
$author->insert();
$newAuthor = Author::getByName($_POST["author"]);

$book = new Book(
    "",
    $_POST["title"],
    $_POST["description"],
    $_POST["pages"],
    $newAuthor[0]->getId(), ""
);
$book->insert();
header("Location: ../index.php");
?>
