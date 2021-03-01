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
    <a href="controllers/insertController.php">Insertar</a>
</header>
<h3>Listado de los articulos</h3>
<!-- articles.php -->
<?php
foreach ($users as $user) {
    ?>
    <h4> <?= $user->getName() ?> </h4>
    Otro artículo
    <h5> <?= $user->getUser() ?> </h5>
    <p> <?= $user->getPassword() ?> </p>
    <p> <?= $user->getEmail() ?> </p>
    <a href="controllers/deleteController.php?id=<?=$user->getId()?>">Borrar</a><br>
    <a href="controllers/updateController.php?id=<?=$user->getId()?>">Modificar</a>
    <hr>
    <?php
}
?>
</body>
</html>