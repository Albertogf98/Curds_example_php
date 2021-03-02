<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertar</title>
</head>
<body>
<h1>Crear ticket</h1>
<form action="/src_orders/controllers/update.php" method="post">
    <label for="description">Descripción</label><br>
    <input type="hidden" id="id" name="id" value="<?= $order[0]->getId() ?>">
    <textarea name="description" id="description"><?= $order[0]->getDescription() ?></textarea><br><br>
    <label for="status">Estado</label><br>
    <select name="status" id="status">
        <option selected>reparto</option>
        <option>entregado</option>
    </select><br><br>
    <button type="submit">Modificar</button>
</form>
</body>
</html>
