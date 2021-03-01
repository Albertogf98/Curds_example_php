<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalles</title>
</head>
<body>
        <?php foreach ($ticket as $item): ?>
            <p>Título: <?= $item->getTitle() ?></p>
            <p>Mensaje: <?= $item->getMessage() ?></p>
            <p>Categoría: <?= $item->getCategory() ?></p>
            <p>Estado: <?= $item->getStatus() ?></p>
        <?php endforeach; ?>
<a href="../index.php">Volver</a>
</body>
</html>