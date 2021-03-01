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
<h1>Modificar un Articulo</h1>
<form action="../controllers/saveUpdateController.php" enctype="multipart/form-data" method="post">
    <label for="title">Título</label><br>
    <input id="title" type="text" name="title" value="<?=$datas->getTitle()?>"><br>
    <input type="hidden" name="id" value="<?=$datas->getId()?>"><br>
    <label for="image">Imagen</label><br>
    <img src="../assets/images/<?=$datas->getImage()?>" width="200"><br><br>
    <input type="file" id="image" name="image"><br><br>
    <input type="hidden" name="oldImage" value="<?=$datas->getImage()?>">
    <label for="content">Contenido</label><br>
    <textarea id="content" name="content" rows="10" cols="30"><?=$datas->getContent()?></textarea><br>
    <input type="submit" value="Modificar">
</form>
</body>
</html>