<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert New Article</title>
</head>
<body>
<h1>Insertar Articulo</h1>
<form action="../controllers/saveArticle.php" enctype="multipart/form-data" method="post">
    <label for="title">Título</label><br>
    <input id="title" type="text" name="title"><br><br>
    <label for="image">Imagen</label>
    <input type="file" id="image" name="image"><br><br>
    <label for="content">Contenido</label><br>
    <textarea id="content" name="content" rows="10" cols="30"></textarea><br>
    <input type="submit" value="Guardar">
</form>
</body>
</html>