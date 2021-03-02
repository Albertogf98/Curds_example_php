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
            <form action="../controllers/update.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="id" id="id" value="<?= $employee[0]->getId() ?>">
                    <label for="deparment">Departamento</label>
                    <input type="text" class="form-control" id="deparment" name="deparment" value="<?= $employee[0]->getDeparment() ?>">
                </div>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $employee[0]->getName() ?>">
                </div>
                <div class="form-group">
                    <label for="surname">Apellidos</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="<?= $employee[0]->getSurname() ?>">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="oldImage" name="oldImage" value="<?= $employee[0]->getImage() ?>">
                    <label for="image">Foto</label>
                    <img src=../assets/images/<?= $employee[0]->getImage() ?>  style="width: 50px; height: 50px"><br><br>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Agregar">
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
