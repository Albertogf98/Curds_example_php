<?php
require_once(__DIR__."/../db/Db.php");

class Ticket
{
    private $id, $title, $status, $category, $priority, $message;

    /**
     * Ticket constructor.
     * @param $id
     * @param $title
     * @param $status
     * @param $category
     * @param $priority
     * @param $message
     */
    public function __construct($id, $title, $status, $category, $priority, $message)
    {
        $this->id = $id;
        $this->title = $title;
        $this->status = $status;
        $this->category = $category;
        $this->priority = $priority;
        $this->message = $message;
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
    public function getTitle()
    {
        return $this->title;
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
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    public function insert() {
        $connection = IncidentDB\Db::connection();
        $sql = "INSERT INTO tickets VALUES (NULL, ?, ?, ?, ?, NULL ,?)";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->title);
        $statement->bindParam(2, $this->status);
        $statement->bindParam(3, $this->category);
        $statement->bindParam(4, $this->priority);
        $statement->bindParam(5, $this->message);

        $statement->execute();

        return $connection->lastInsertId();
    }

    public static function getAll($email) {
        $connection = IncidentDB\Db::connection();
        $sql = "SELECT *,t.id AS ticketID, tu.last_update AS lastupdate FROM tickets t RIGHT JOIN ticket_user tu ON t.id = tu.ticket_id LEFT JOIN users u ON u.id = tu.user_id WHERE email =:email";
        $rows = $connection->prepare($sql);
        $rows->bindParam("email",$email);
        $rows->execute();
        $tickets = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            $tickets[] = new Ticket($row["ticketID"], $row["title"], $row["status"], $row["category"], $row["priority"],  $row["lastupdate"]);
        }
        return $tickets;
    }
    public static function getAllForAdmin() {
        $connection = IncidentDB\Db::connection();
        $sql = "SELECT *,t.id AS ticketID, tu.last_update AS lastupdate, u.email FROM tickets t RIGHT JOIN ticket_user tu ON t.id = tu.ticket_id LEFT JOIN users u ON u.id = tu.user_id";
        $rows = $connection->query($sql);
        $tickets = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            $tickets[] = new Ticket($row["ticketID"], $row["title"], $row["status"], $row["category"], $row["priority"],  $row["email"]);
        }
        return $tickets;
    }

    public static function getById($id) {
        $connection = IncidentDB\Db::connection();
        $sql = "SELECT * FROM tickets WHERE id = ".$id;
        $rows = $connection->query($sql);
        $rows->execute();
        $tickets = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            $tickets[] = new Ticket($row["id"], $row["title"], $row["status"], $row["category"], $row["priority"],  $row["message"]);
        }
        return $tickets;
    }

    public static function delete($id) {
        $connection = IncidentDB\Db::connection();
        $sql = "UPDATE tickets SET status='close' WHERE id= ".$id;
        $connection->exec($sql);
    }


}