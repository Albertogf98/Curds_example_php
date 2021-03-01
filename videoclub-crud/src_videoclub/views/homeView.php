<?php
require_once( __DIR__ . "/../vendor/stefangabos/zebra_pagination/Zebra_Pagination.php");

$pages = 3;
$zebraPagination = new Zebra_Pagination();

$zebraPagination->navigation_position
            (
        isset($_GET["navigation_position"]) &&
                in_array($_GET["navigation_position"],
                array("left", "right")) ?
                $_GET["navigation_position"] : "outside"
            );

if (isset($_GET["reversed"])) $zebraPagination->reverse(true);

$zebraPagination->records(count($movies));
$zebraPagination->records_per_page($pages);

$movies = array_slice($movies, (($zebraPagination->get_page() - 1) * $pages), $pages);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Videoclub</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Director</th>
                    <th>Año</th>
                    <th>Formato</th>
                    <th>Género</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($movies as $movie):
                    ?>
                    <tr>
                        <td><?= $movie->getTitle() ?></td>
                        <td><?= $movie->getDirector() ?></td>
                        <td><?= $movie->getYear() ?></td>
                        <td><?= $movie->getFormat() ?></td>
                        <td><?= $movie->getGender() ?></td>
                        <td><a href="../src_videoclub/controllers/deleteController.php?id=<?= $movie->getId() ?>" class="btn btn-danger">Eliminar</a></td>
                        <td><a href="../src_videoclub/controllers/updateController.php?id=<?= $movie->getId() ?>" class="btn btn-warning">Modificar</a></td>
                    </tr>
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
          <!--
          <form method="get" action="/controllers/insertController.php">
                <input type="submit" class="btn btn-primary" value="Añadir">
          </form>
          -->
            <a href="../src_videoclub/controllers/insertController.php" class="btn btn-primary">Añadir</a>
        </div>
    </div><br><br>
    <?php $zebraPagination->render(); ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>