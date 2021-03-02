<?php
namespace OrdersDB;
use PDO;

class Db {
    private static $host = "146.59.159.215";
    private static $user = "alberto";
    private static $password = "123";
    private static $database = "OrdersDB";
    private static $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

    function __construct() { }

    public static function connection() {
        try {
            $connection = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$database, self::$user, self::$password, self::$options);
        } catch (PDOException $err) {
            die("ERROR: Could not connect" . $err->getMessage());
        }
        return $connection;
    }
}
?>