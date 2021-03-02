<?php
require_once( __DIR__ . "/../controllers/deleteController.php");
Employee::delete($_GET["id"]);
?>
