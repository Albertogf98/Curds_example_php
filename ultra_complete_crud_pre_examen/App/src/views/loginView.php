<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
</head>
<body>
<form action="/App/src/controllers/loginController.php" method="post">
    <h1>Inicio de sesión</h1>
    <p>Email</p>
    <input type="email" name="email" id="email">
    <p>Contraseña</p>
    <input type="password" name="password" id="password"><br>
    <input type="submit" value="Inicar sesión">
</form>
<form action="/App/src/controllers/singupController.php" method="post">
    <input type="submit" value="Crear cuenta">
</form>
</body>
</html>