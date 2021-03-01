<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <form action="../controllers/insert.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="author">Título</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="name">Director</label>
                    <input type="text" class="form-control" id="director" name="director">
                </div>
                <div class="form-group">
                    <label for="name">Año</label>
                    <input type="date" class="form-control" id="year" name="year">
                </div>
                <div class="form-group">
                    <label for="format">Formato</label>
                    <select id="format" name="format">
                        <option>dvd</option>
                        <option>digital</option>
                        <option>cinta</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender">Género</label>
                    <select id="gender" name="gender">
                        <?php foreach ($genders as $gender): ?>
                        <option><?= $gender->getName() ?></option>
                        <?php endforeach; ?>
                    </select>
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