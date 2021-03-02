<?php
require_once('../models/Employee.php');

move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/".$_FILES['image']['name']);

$newEmployee = new Employee("", "", $_POST["deparment"], $_POST["name"], $_POST["surname"] ,$_FILES["image"]["name"]);
$newEmployee->insert();

header('Location: ../index.php');
?>