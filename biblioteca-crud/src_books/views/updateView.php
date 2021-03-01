<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <form action="../controllers/updateController.php" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $book->getId() ?>">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $book->getAuthor() ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="surname">Apellidos</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="<?= $book->getAuthorSurname() ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="phone">Título</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $book->getTitle() ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Descripción</label>
                    <textarea class="form-control" id="description" name="description"><?= $book->getDescription() ?></textarea>
                </div>
                <div class="form-group">
                    <label for="pages">Páginas</label>
                    <input type="number" class="form-control" id="pages" name="pages" value="<?= $book->getPages() ?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Modificar">
                    <a href="../index.php" class="btn btn-light">Volver</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>
