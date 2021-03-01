<?php
define("HOST","mysql:host=146.59.159.215;dbname=db_foro");
define("USER","alberto");
define("PASSWORD","123");
class DatabaseConnection {

    function __construct() { }

    public static function connectToDb() {
        try {
            $conn = new PDO(HOST, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $err) {
            die("ERROR: No se puedo conectar ". $err->getMessage());
        }
        return $conn;
    }
}
?>