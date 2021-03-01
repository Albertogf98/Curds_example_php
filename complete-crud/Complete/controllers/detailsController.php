<?php
require_once( __DIR__ . "/../models/Ticket.php");
$ticket = Ticket::getById($_GET["id"]);
require_once( __DIR__ . "/../views/detailsView.php");
?>
