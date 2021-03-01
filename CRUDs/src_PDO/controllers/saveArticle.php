<?php
require_once('../models/Article.php');

move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/".$_FILES['image']['name']);

$article = new Article("", $_POST["title"], date("Y-m-d"), $_POST["content"], $_FILES["image"]["name"]);
$article->insertArticle();

header('Location: ../index.php');
?>