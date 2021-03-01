<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuevo</title>
</head>
<body>
<h1>Crear ticket</h1>
<form action="/Complete/controllers/saveNewUser.php" method="post">
    Título:<input type="text" name="name" id="name"><br>
    Email:<input  type="email" name="email" id="email"><br>
    Contraseña:<input type="password" name="password" id="password"><br>
   <input type="hidden" name="userType" id="userType" value="user"><br>
    <input type="submit" value="agregar">
</form>
</body>
</html>
