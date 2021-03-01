<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Usuario</title>
</head>
<body>
<h1>Bienvenido</h1>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Categoría</th>
        <th scope="col">Título</th>
        <th scope="col">Estado</th>
        <th scope="col">Acción</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($usersWithTickets as $ticket): ?>
        <tr>
        <td><?= $ticket->getCategory() ?></td>
            <td><a href="/Complete/controllers/detailsController.php?id=<?= $ticket->getId() ?>"><?= $ticket->getTitle() ?></a></td>
            <td><?= $ticket->getStatus() ?></td>
            <td><a href="/Complete/controllers/deleteController.php?id=<?= $ticket->getId() ?>">Cerrar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="/Complete/controllers/insertController.php" class="btn btn-primary">Añadir</a>
<form action="/Complete/controllers/closeSessionController.php" method="post"><input type="submit" value="cerrar sesión"><form>
</body>
</html>