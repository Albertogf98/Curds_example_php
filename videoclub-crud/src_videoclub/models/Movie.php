<?php
require_once(__DIR__."/../db/Db.php");

class Movie {
    private $id, $title, $director, $year, $format, $gender;

    /**
     * Movie constructor.
     * @param $id
     * @param $title
     * @param $director
     * @param $year
     * @param $format
     * @param $gender
     */
    public function __construct($id, $title, $director, $year, $format, $gender)
    {
        $this->id = $id;
        $this->title = $title;
        $this->director = $director;
        $this->year = $year;
        $this->format = $format;
        $this->gender = $gender;
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
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    public function insert() {
        $connection = VideoClubDB\Db::connection();
        $sql = "INSERT INTO movies VALUES(null, ?, ?, ?, ?, ?)";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->title);
        $statement->bindParam(2, $this->director);
        $statement->bindParam(3, $this->year);
        $statement->bindParam(4, $this->format);
        $statement->bindParam(5, $this->gender);
        $statement->execute();
    }

    public static function getAll() {
        $connection = VideoClubDB\Db::connection();
       // $sql = "SELECT * FROM movies";
        $sql = "SELECT *, m.id AS movie_id, g.name AS gender_name FROM movies m JOIN genders g ON g.id = m.gender_id";
        $rows = $connection->query($sql);
        $movies = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) $movies[] = new Movie($row["movie_id"], $row["title"], $row["director"], $row["year"], $row["format"], $row["gender_name"]);

        return $movies;
    }

    public static function delete($id) {
        $connection = VideoClubDB\Db::connection();
        $sql = "DELETE FROM movies WHERE id = :id";
        $statement = $connection->prepare($sql);

        $statement->bindParam("id", $id);
        $statement->execute();
    }

    public function update() {
        $connection = VideoClubDB\Db::connection();
        $sql = "UPDATE movies SET title=?, director=?, year=?, format=?, gender_id=? WHERE id=?";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->title);
        $statement->bindParam(2, $this->director);
        $statement->bindParam(3, $this->year);
        $statement->bindParam(4, $this->format);
        $statement->bindParam(5, $this->gender);
        $statement->bindParam(6, $this->id);

        $statement->execute();
    }

    public static function getById($id) {
        $connection = VideoClubDB\Db::connection();
        $sql = "SELECT * FROM movies WHERE id=:id";
        $rows = $connection->prepare($sql);
        $rows->bindParam("id", $id);
        $rows->execute();
        $movies = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC))
         $movies[] = new Movie($row["id"], $row["title"], $row["director"], $row["year"], $row["format"], $row["gender_id"]);

        return $movies;
    }

    public static function getByTitle($title) {
        $connection = VideoClubDB\Db::connection();
        $sql = "SELECT * FROM movies WHERE title=?";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $title);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return new Movie($row["id"], $row["title"], $row["director"], $row["year"], $row["format"], $row["gender_id"]);    }
}