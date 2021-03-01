<?php
define("HOST","mysql:host=146.59.159.215;dbname=BlogDB");
define("USER","alberto");
define("PASSWORD","123");

class BlogDB {

    function __construct() {}

    private function __clone() {}

    public static function getConnection() {
        try {
            $conn = new PDO(HOST, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $err) {
            die("ERROR: No se puedo conectar ". $err->getMessage());
        }
        return $conn;
    }
}
?>