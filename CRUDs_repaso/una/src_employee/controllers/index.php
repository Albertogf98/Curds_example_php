<?php
require_once( __DIR__ . "/../models/Employee.php");
$employees = Employee::getAll();
require_once( __DIR__ . "/../views/homeView.php");
?>