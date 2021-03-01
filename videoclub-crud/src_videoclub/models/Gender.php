<?php
require_once(__DIR__."/../db/Db.php");

class Gender {

    private $id, $name;

    /**
     * Gender constructor.
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
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
    public function getName()
    {
        return $this->name;
    }

    public function insert() {
        $connection = VideoClubDB\Db::connection();
        $sql = "INSERT INTO genders VALUES(null, ?)";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->name);
        $statement->execute();
    }

    public static function getAll() {
        $connection = VideoClubDB\Db::connection();
        $sql = "SELECT * FROM genders";
        $rows = $connection->query($sql);
        $genders = [];

        while ($row = $rows->fetch()) $genders[] = new Gender($row["id"], $row["name"]);

        return $genders;
    }

    public static function delete($id) {
        $connection = VideoClubDB\Db::connection();
        $sql = "DELETE FROM genders WHERE id = :id";
        $statement = $connection->prepare($sql);

        $statement->bindParam("id", $id);
        $statement->execute();
    }

    public function update() {
        $connection = VideoClubDB\Db::connection();
        $sql = "UPDATE genders SET name=? WHERE id=?";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->name);
        $statement->bindParam(2, $this->id);

        $statement->execute();
    }

    public static function getById($id) {
        $connection = VideoClubDB\Db::connection();
        $sql = "SELECT * FROM genders WHERE id=?";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $id);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return new Gender($row["id"], $row["name"]);
    }

    public static function getByName($name) {
        $connection = VideoClubDB\Db::connection();
        $sql = "SELECT * FROM genders WHERE name=?";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $name);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return new Gender($row["id"], $row["name"]);
    }
}