<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
</head>
<body>
<form action="/Complete/controllers/loginController.php" method="post">
    <h1>Inciar sesión</h1>
    <p>Email</p>
    <input type="email" name="email" id="email">
    <p>Contraseña</p>
    <input type="password" name="password" id="password"><br>
    <input type="submit" value="Inicar sesión">
</form>
<form action="/Complete/controllers/singupController.php" method="post">

    <input type="submit" value="Crear cuenta">
</form>
</body>
</html>