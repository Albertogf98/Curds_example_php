<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Home</h1><form method="GET" action="../controllers/closeController.php"><button type="submit">Cerrar sesión</button></form><br>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>imagen</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order->getId() ?></td>
                        <td><?= $order->getDescription() ?></td>
                        <td><?= $order->getStatus() ?></td>
                        <td><img src=../assets/images/<?= $order->getImage() ?> style=width: 200px; height=100px"></td>
                        <td><?= $order->getClient() ?></td>
                        <td>
                            <a href="../controllers/deleteController.php?id=<?= $order->getId() ?>" class="btn btn-danger">Entregado</a>
                            <a href="../controllers/updateController.php?id=<?= $order->getId() ?>" class="btn btn-warning">Modificar</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="../controllers/insertController.php" class="btn btn-primary">Añadir</a>
        </div>
    </div><br><br>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>
</body>
</html>
