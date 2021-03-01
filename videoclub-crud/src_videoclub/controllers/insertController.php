<?php
require_once( __DIR__ . "/../models/Gender.php");
$genders = Gender::getAll();
require_once( __DIR__ . "/../views/insertView.php");
?>
