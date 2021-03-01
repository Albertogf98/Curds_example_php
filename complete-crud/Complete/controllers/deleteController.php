<?php
require_once( __DIR__ . "/../models/Ticket.php");
Ticket::delete($_GET["id"]);
header("Location: ../index.php");
?>
