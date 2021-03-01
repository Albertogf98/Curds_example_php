<?php
require_once( __DIR__ . "/../models/User.php");
$datas = User::getById($_GET['id']);
require_once( __DIR__ . "/../views/updateView.php");
?>
