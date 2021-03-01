<?php
require_once( __DIR__ . "/../models/User.php");
require_once( __DIR__ . "/../models/Ticket.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $userLogger = User::getByEmail($_POST["email"]);
    $usersWithTickets = Ticket::getAll($_POST["email"]);
    $adminTickets = Ticket::getAllForAdmin();

    if (empty($_POST["email"]) || empty($_POST["password"]) || empty($userLogger)) {

    require_once( __DIR__ . "/../views/loginView.php");

} else if ($userLogger[0]->getEmail() === $_POST["email"] && $userLogger[0]->getPassword() === $_POST["password"]) {

    if ($userLogger[0]->getUserType() === "admin") {
        require_once( __DIR__ . "/../views/homeView.php");
        session_destroy();
        session_start();
        $_SESSION["user"] = $userLogger[0]->getEmail();
    } else {
        require_once( __DIR__ . "/../views/homeUserView.php");
        session_destroy();
        session_start();
        $_SESSION["user"] = $userLogger[0]->getEmail();
    }
}
die();
}
include_once( __DIR__ . "/../views/loginView.php");
?>