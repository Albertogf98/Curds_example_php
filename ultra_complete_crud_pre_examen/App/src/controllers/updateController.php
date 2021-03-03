<?php
require_once(__DIR__ . "/../../vendor/autoload.php");
$order = \Models\Order::getById($_GET['id']);
require_once( __DIR__ . "/../views/updateView.php");
