<?php
$recordsPerPage = 2;
require_once('Zebra_Pagination.php');//vendor/stefangabos/zebra_pagination/Zebra_Pagination.php

$zebaraPagination = new Zebra_Pagination();

$zebaraPagination->navigation_position(isset($_GET["navigation_position"]) && in_array($_GET["navigation_position"], array("left", "right")) ? $_GET["navigation_position"] : "outside");

if (isset($_GET["reversed"])) {
    $zebaraPagination->reverse(true);
}

$zebaraPagination->records(count($articles));
$zebaraPagination->records_per_page($recordsPerPage);

$articles= array_slice($articles, (($zebaraPagination->get_page() - 1) * $recordsPerPage), $recordsPerPage);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles-Views</title>
</head>
<style>
    li {
        list-style: none;
        display: inline-block;
        margin: 2% 2% 2% 2% ;
    }

</style>
<body>
<header>Esto es una cabecera <br>
    <a href="controllers/insertController.php">Insertar un nuevo artículo</a>
</header>
<h3>Listado de los articulos</h3>
<!-- articles.php -->
<?php
foreach ($articles as $article) {
    ?>
    <h4> <?= $article->getTitle() ?> </h4>
    Otro artículo
    <h5> <?= $article->getPublicationDate() ?> </h5>
    <?php
    $image = $article->getImage();
    if (isset($image)) {
        echo "<img src=\"assets/images/" . $image . "\" width='200'><br>";
    }
    ?>
    <p> <?= $article->getContent() ?> </p>
    <a href="controllers/deleteController.php?id=<?=$article->getId()?>">Borrar artículo</a><br>
    <a href="controllers/updateController.php?id=<?=$article->getId()?>">Modificar artículo</a>
    <hr>
    <?php
}
$zebaraPagination->render();
?>
</body>
</html>