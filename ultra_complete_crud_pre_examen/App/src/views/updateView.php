<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar</title>
</head>
<body>
<h1>Crear ticket</h1>
<form action="../controllers/update.php" method="post" enctype="multipart/form-data">
    <label for="description">Descripción</label><br>
    <input type="hidden" id="id" name="id" value="<?= $order[0]->getId() ?>">
    <textarea name="description" id="description"><?= $order[0]->getDescription() ?></textarea><br><br>
    <label for="image">Imagen</label><br>
    <img src="../assets/images/<?=$order[0]->getImage()?>" width="200"><br><br>
    <input type="file" id="image" name="image"><br><br>
    <input type="hidden" name="oldImage" value="<?=$order[0]->getImage()?>"><br>
    <label for="status">Estado</label><br>
    <select name="status" id="status">
        <option selected>reparto</option>
        <option>entregado</option>
    </select><br><br>
    <button type="submit">Modificar</button>
</form>
</body>
</html>
