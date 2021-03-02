<?php
require_once( __DIR__ . "/../models/Employee.php");
$employee = Employee::getById($_GET['id']);
require_once( __DIR__ . "/../views/updateView.php");
?>

