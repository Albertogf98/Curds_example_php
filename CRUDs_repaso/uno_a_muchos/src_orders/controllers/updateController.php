<?php
require_once( __DIR__ . "/../models/Order.php");
$order = Order::getById($_GET['id']);
require_once( __DIR__ . "/../views/updateView.php");
?>