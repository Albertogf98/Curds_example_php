<?php
require_once( __DIR__ . "/../db/Db.php");

class Order
{
    private $id, $description, $status, $client;

    /**
     * Order constructor.
     * @param $id
     * @param $description
     * @param $status
     * @param $client
     */
    public function __construct($id, $description, $status, $client)
    {
        $this->id = $id;
        $this->description = $description;
        $this->status = $status;
        $this->client = $client;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    public function insert() {
        $connection = OrdersDB\Db::connection();
        $sql = "INSERT INTO orders VALUES (null, ?, ?, ?)";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->description);
        $statement->bindParam(2, $this->status);
        $statement->bindParam(3, $this->client);
        $statement->execute();
    }

    public static function getAll($email) {
        $connection = OrdersDB\Db::connection();
        $sql = "SELECT c.email AS client_email, o.* FROM orders o LEFT JOIN clients c ON o.client_id = c.id WHERE email = ?";
        $rows = $connection->prepare($sql);
        $rows->bindParam(1,$email);
        $rows->execute();
        $orders = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC))
            $orders[] = new Order($row["id"], $row["description"], $row["status"], $row["client_email"]);

        return $orders;
    }

    public static function delete($id) {
        $connection = OrdersDB\Db::connection();
        $sql = "UPDATE orders SET status='entregado' WHERE id= ?";
        $statement = $connection->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();
    }

    public function update() {
        $connection = OrdersDB\Db::connection();
        $sql = "UPDATE orders SET description=?, status=? WHERE id=?";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->description);
        $statement->bindParam(2, $this->status);
        $statement->bindParam(3, $this->id);

        $statement->execute();
    }

    public static function getById($id) {
        $connection = OrdersDB\Db::connection();
        $sql = "SELECT * FROM orders WHERE id = ?";
        $rows = $connection->prepare($sql);
        $rows->bindParam(1,$id);
        $rows->execute();
        $orders = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC))
            $orders[] = new Order($row["id"], $row["description"], $row["status"], $row["client_id"]);

        return $orders;
    }

}