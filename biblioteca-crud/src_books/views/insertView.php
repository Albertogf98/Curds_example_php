<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de empleados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <form action="../controllers/save.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="author">Nombre</label>
                    <input type="text" class="form-control" id="author" name="author">
                </div>
                <div class="form-group">
                    <label for="name">Apellidos</label>
                    <input type="text" class="form-control" id="surname" name="surname">
                </div>
                <div class="form-group">
                    <label for="name">Edad</label>
                    <input type="number" class="form-control" id="age" name="age">
                </div>
                <div class="form-group">
                    <label for="name">Título</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea  class="form-control"  id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="pages">Páginas</label>
                    <input type="number" class="form-control" id="pages" name="pages">
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