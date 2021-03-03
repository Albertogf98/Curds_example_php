<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertar</title>
</head>
<body>
<h1>Crear ticket</h1>
<form action="../controllers/insert.php" method="post" enctype="multipart/form-data">
    <label for="description">Descripción</label><br>
    <textarea name="description" id="description"></textarea><br>
    <label for="image">Foto producto</label><br>
    <input type="file" id="image" name="image"><br><br>
    <button type="submit">Agregar</button>
</form>
</body>
</html>