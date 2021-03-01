<?php
require_once('../src_PDO/models/Article.php');
$articles = Article::getAllArticles();
require_once('../src_PDO/views/home.view.php');
?>
