<?php
require_once(__DIR__ . "/../../vendor/autoload.php");
$orders = \Models\Order::getAll($_SESSION["email"]);
require_once( __DIR__ . "/../views/homeView.php");
