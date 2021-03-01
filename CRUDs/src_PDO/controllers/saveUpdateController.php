<?php
require_once("../models/Article.php");

if (!empty($_FILES["image"]["name"])) {

    move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/".$_FILES['image']['name']);
    $article = new Article($_POST["id"],$_POST["title"], date("Y-m-d"), $_POST["content"], $_FILES["image"]["name"]);
} else {
    $article = new Article($_POST["id"],$_POST["title"], date("Y-m-d"), $_POST["content"], $_POST["oldImage"]);
}

$article->updateArticle();
header("Location: ../index.php");
?>