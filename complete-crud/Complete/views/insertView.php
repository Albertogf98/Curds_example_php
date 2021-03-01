<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertar Ticket</title>
</head>
<body>
<h1>Crear ticket</h1>
<form action="/Complete/controllers/save.php" method="post">
Título:<input name="title" id="title"><br>
Categoría:
    <select id="category" name="category">
        <option>Education</option>
        <option>Communication</option>
        <option>Technical</option>
    </select><br>
Prioridad:
    <select id="priority" name="priority">
        <option>Low</option>
        <option>Medium</option>
        <option>High</option>
    </select><br>
    Message:<textarea name="message" id="message"></textarea><br>
    <input type="submit" value="agregar">
</form>
</body>
</html>