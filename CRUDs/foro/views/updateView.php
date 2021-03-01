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
    <label for="name">Nombre</label><br>
    <input id="name" type="text" name="name" value="<?=$datas->getName()?>"><br>
    <input type="hidden" name="id" value="<?=$datas->getId()?>"><br>

    <label for="user">Usuario</label><br>
    <input id="user" type="text" name="user" value="<?=$datas->getName()?>"><br>

    <label for="password">Clave</label><br>
    <input id="password" type="text" name="password" value="<?=$datas->getPassword()?>"><br>

    <label for="email">Email</label><br>
    <input id="email" type="text" name="email" value="<?=$datas->getEmail()?>"><br>
    <input type="submit" value="Modificar">
</form>
</body>
</html>