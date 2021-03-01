<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Admin</title>
</head>
<body>
<h1>Bienvenido</h1>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Categoría</th>
        <th scope="col">Título</th>
        <th scope="col">Estado</th>
        <th scope="col">Usuario</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($adminTickets as $ticket): ?>
        <tr>
        <td><?= $ticket->getCategory() ?></td>
        <td><?= $ticket->getTitle() ?></td>
        <td><?= $ticket->getStatus() ?></td>
        <td><?= $ticket->getMessage() ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<form action="/Complete/controllers/closeSessionController.php" method="post"><input type="submit" value="cerrar sesión"><form>
</body>
</html>