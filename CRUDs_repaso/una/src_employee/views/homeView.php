<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th>UUID</th>
                    <th>Departamento</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Imágen</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($employees as $employee):
                    ?>
                    <tr>
                        <td><?= $employee->getUuid() ?></td>
                        <td><?= $employee->getDeparment() ?></td>
                        <td><?= $employee->getName() ?></td>
                        <td><?= $employee->getSurname() ?></td>
                        <td><img src=../src_employee/assets/images/<?= $employee->getImage() ?> style="width: 50px; height="50px"></td>
                        <td><a href="../src_employee/controllers/deleteController.php?id=<?= $employee->getId() ?>" class="btn btn-danger">Eliminar</a></td>
                        <td><a href="../src_employee/controllers/updateController.php?id=<?= $employee->getId() ?>" class="btn btn-warning">Modificar</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="../src_employee/controllers/insertController.php" class="btn btn-primary">Añadir</a>
        </div>
    </div><br><br>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>
