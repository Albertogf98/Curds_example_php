<?php
namespace Models;
require_once(__DIR__."/../../vendor/autoload.php");
use PDO;
//COMANDO PARA EL AUTOLOAD -> composer dump-autoload


class Order
{
    private $id, $description, $status, $image, $client;

    /**
     * Order constructor.
     * @param $id
     * @param $description
     * @param $status
     * @param $image
     * @param $client
     */
    public function __construct($id, $description, $status, $image, $client)
    {
        $this->id = $id;
        $this->description = $description;
        $this->status = $status;
        $this->image = $image;
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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }


    public function insert() {
        $connection = \ConfigurationDB\Database::connection();
        $sql = "INSERT INTO orders VALUES (null, ?, ?, ?, ?)";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->description);
        $statement->bindParam(2, $this->status);
        $statement->bindParam(3, $this->image);
        $statement->bindParam(4, $this->client);
        $statement->execute();
    }

    public static function getAll($email) {
        $connection = \ConfigurationDB\Database::connection();
        $sql = "SELECT u.email AS user_email, o.* FROM orders o LEFT JOIN users u ON o.client_id = u.id WHERE email = ?";
        $rows = $connection->prepare($sql);
        $rows->bindParam(1, $email);
        $rows->execute();
        $usersWithOrders = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC))
            $usersWithOrders[] = new Order($row["id"], $row["description"], $row["status"], $row["image"], $row["user_email"]);

        return $usersWithOrders;
    }

    public static function updateEnum($id) {
        $connection = \ConfigurationDB\Database::connection();
        $sql = "UPDATE orders SET status = 'entregado' WHERE id= ?";
        $statement = $connection->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();
    }

    public function update() {
        $connection = \ConfigurationDB\Database::connection();
        $sql = "UPDATE orders SET description = ?, status = ?, image = ? WHERE id = ?";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->description);
        $statement->bindParam(2, $this->status);
        $statement->bindParam(5, $this->image);
        $statement->bindParam(4, $this->id);

        $statement->execute();
    }


    public static function getById($id) {
        $connection = \ConfigurationDB\Database::connection();
        $sql = "SELECT *  FROM orders WHERE id = ?";
        $rows = $connection->prepare($sql);
        $rows->bindParam(1,$id);
        $rows->execute();
        $orders = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC))
            $orders[] = new Order($row["id"], $row["description"], $row["status"], $row["image"], $row["client_id"]);

        return $orders;
    }
}