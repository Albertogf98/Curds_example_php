<?php
use EmployeesDB\Db;
require_once(__DIR__."/../db/Db.php");

class Employee
{

    private $id, $uuid, $deparment, $name, $surname, $image;

    /**
     * Employee constructor.
     * @param $id
     * @param $uuid
     * @param $deparment
     * @param $name
     * @param $surname
     * @param $image
     */
    public function __construct($id, $uuid, $deparment, $name, $surname, $image)
    {
        $this->id = $id;
        $this->uuid = $uuid;
        $this->deparment = $deparment;
        $this->name = $name;
        $this->surname = $surname;
        $this->image = $image;
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
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return mixed
     */
    public function getDeparment()
    {
        return $this->deparment;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    public function uuidV4($data = null) {
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public function insert() {
        $connection = EmployeesDB\Db::connection();
        $sql = "INSERT INTO employees VALUES (null, ?, ?, ?, ?, ?)";
        $statement = $connection->prepare($sql);

        $this->uuid = $this->uuidV4();

        $statement->bindParam(1, $this->uuid);
        $statement->bindParam(2, $this->deparment);
        $statement->bindParam(3, $this->name);
        $statement->bindParam(4, $this->surname);
        $statement->bindParam(5, $this->image);
        $statement->execute();
    }

    public static function getAll() {
        $connection = EmployeesDB\Db::connection();
        $sql = "SELECT * FROM employees";
        $rows = $connection->query($sql);
        $employees = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC))
            $employees[] = new Employee($row["id"], $row["uuid"], $row["deparment"], $row["name"], $row["surname"], $row["image"]);

        return $employees;
    }

    public static function delete($id) {
        $connection = EmployeesDB\Db::connection();
        $sql = "DELETE FROM employees WHERE id = :id";
        $statement = $connection->prepare($sql);

        $statement->bindParam("id", $id);
        $statement->execute();
    }

    public function update() {
        $connection = EmployeesDB\Db::connection();
        $sql = "UPDATE employees SET deparment=?, name=?, surname=?, image=? WHERE id=?";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->deparment);
        $statement->bindParam(2, $this->name);
        $statement->bindParam(3, $this->surname);
        $statement->bindParam(4, $this->image);
        $statement->bindParam(5, $this->id);

        $statement->execute();
    }

    public static function getById($id) {
        $connection = EmployeesDB\Db::connection();
        $sql = "SELECT * FROM employees WHERE id=:id";
        $rows = $connection->prepare($sql);
        $rows->bindParam("id", $id);
        $rows->execute();
        $employees = [];

        while ($row = $rows->fetch())//PDO::FETCH_ASSOC
            $employees[] = new Employee($row["id"], $row["uuid"], $row["deparment"], $row["name"], $row["surname"], $row["image"]);

        return $employees;
    }
}
