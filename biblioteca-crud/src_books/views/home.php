<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Librería</title>
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
                    <th>Autor</th>
                    <th>Descripción</th>
                    <th>Páginas</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($books as $book):
                    ?>
                    <tr>
                        <td><?= $book->getTitle() ?></td>
                        <td><?= $book->getAuthor() ?></td>
                        <td><?= $book->getDescription() ?></td>
                        <td><?= $book->getPages() ?></td>
                        <td><a href="../src_books/controllers/deleteController.php?id=<?= $book->getId() ?>" class="btn btn-danger">Eliminar</a></td>
                        <td><a href="../src_books/controllers/update.php?id=<?= $book->getId() ?>" class="btn btn-warning">Modificar</a></td>
                    </tr>
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
            <a href="../src_books/controllers/insertController.php" class="btn btn-primary">Añadir Libro</a>
        </div>
    </div>
    <?php
    ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>