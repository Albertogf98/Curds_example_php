<?php
require_once( __DIR__ . "/../models/User.php");
require_once( __DIR__ . "/../models/Ticket.php");
require_once( __DIR__ . "/../models/Incidences.php");
session_start();
$newTicket = new Ticket("", $_POST["title"], "open", $_POST["category"], $_POST["priority"],  $_POST["message"]);
$lastInsertedID = $newTicket->insert();
$currentUser = User::getByEmail($_SESSION["user"]);
$currentUser[0]->getId();
$pivotIncidences = new Incidences($lastInsertedID, $currentUser[0]->getId());
$pivotIncidences->insert();

header("Location: ../index.php");
