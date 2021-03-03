<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuevo</title>
</head>
<body>
<h1>Nuevo usuario</h1>
<form action="/App/src/controllers/singup.php" method="post">
    <label>Nombre</label><br>
    <input  type="text" name="name" id="name"><br><br>
    <label>Email</label><br>
    <input  type="email" name="email" id="email"><br><br>
    <label>Contraseña</label><br>
    <input type="password" name="password" id="password"><br><br>
    <input type="submit" value="agregar">
</form>
</body>
</html>

