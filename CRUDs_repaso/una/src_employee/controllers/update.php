<?php
require_once( __DIR__ . "/../models/Employee.php");

if (!empty($_FILES["image"]["name"])) {

    move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/".$_FILES['image']['name']);
    $employee = new Employee($_POST["id"], "", $_POST["deparment"], $_POST["name"], $_POST["surname"], $_FILES["image"]["name"]);
} else {
    $employee = new Employee($_POST["id"], "", $_POST["deparment"], $_POST["name"], $_POST["surname"], $_POST["oldImage"]);
}

$employee->update();
header("Location: ../index.php");
?>