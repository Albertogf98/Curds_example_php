<?php

require_once(__DIR__."/../db/Db.php");

class Author {

    private $id, $name, $surname, $age;

    /**
     * Author constructor.
     * @param $id
     * @param $name
     * @param $surname
     * @param $age
     */
    public function __construct($id, $name, $surname, $age) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getAge() {
        return $this->age;
    }

    public function insert() {
        $connection = BookDB\Db::connection();
        $sql = "INSERT INTO authors VALUES(NULL, ?, ?, ?)";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->name);
        $statement->bindParam(2, $this->surname);
        $statement->bindParam(3, $this->age);

        $statement->execute();
    }

    public static function getAll() {
        $connection = BookDB\Db::connection();
        $sql = "SELECT * FROM authors";
        $rows =  $connection->query($sql);
        $authors = [];

        while ($row = $rows->fetch()) {
            $authors[] = new Author($row["id"], $row["name"], $row["surname"], $row["age"]);
        }
        return $authors;
    }

    public static function delete($id) {
        $connection = BookDB\Db::connection();
        $sql = "DELETE FROM authors WHERE id = $id";
        $connection->exec($sql);
    }

    public function update() {
        $connection = BookDB\Db::connection();
        $sql = "UPDATE authors SET  name=?, surname=?, age=? WHERE id = ".$this->id;
        $statement = $connection->prepare($sql);


        $statement->bindParam(1, $this->name);
        $statement->bindParam(2, $this->surname);
        $statement->bindParam(3, $this->age);

        $statement->execute();
    }

    public static function getById($id) {
        $connection = BookDB\Db::connection();
        $sql = "SELECT * FROM authors WHERE id = :id";
        $statement = $connection->prepare($sql);

        $statement->bindParam("id", $id);

        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return new Author($row["id"], $row["name"], $row["surname"], $row["age"]);
    }

    public static function getByName($name) {
        $connection = BookDB\Db::connection();
        $sql = "SELECT * FROM authors WHERE name = :name";
        $rows = $connection->prepare($sql);
        $rows->bindParam("name", $name);
        $rows->execute();
        $athors = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            $athors[] = new Author($row["id"], $row["name"], $row["surname"], $row["age"]);
        }
        return $athors;
    }

}