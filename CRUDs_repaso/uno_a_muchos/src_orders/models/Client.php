<?php
require_once( __DIR__ . "/../db/Db.php");

class Client {
    private $id, $email, $password;

    /**
     * Client constructor.
     * @param $id
     * @param $email
     * @param $password
     */
    public function __construct($id, $email, $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function insert() {
        $connection = OrdersDB\Db::connection();
        $sql = "INSERT INTO clients VALUES (null, ?, ?)";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->email);
        $statement->bindParam(2, $this->password);
        $statement->execute();
    }

    public static function getByEmail($email) {
        $connection = OrdersDB\Db::connection();
        $sql = "SELECT * FROM clients WHERE email=?";
        $rows = $connection->prepare($sql);
        $rows->bindParam(1, $email);
        $rows->execute();
        $clients = [];

        while ($row = $rows->fetch())//PDO::FETCH_ASSOC
            $clients[] = new Client($row["id"], $row["email"], $row["password"]);

        return $clients;
    }
}