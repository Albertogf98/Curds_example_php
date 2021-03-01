<?php
require_once('../models/Article.php');
Article::deleteArticle($_GET["id"]);
 ?>
