<?php
require_once('../models/Article.php');

$datas = Article::getArticleById($_GET['id']);

require_once('../views/update.view.php');
?>
