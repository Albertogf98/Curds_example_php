<?php

require_once(__DIR__."/../db/Db.php");

class Book {

    private $id, $title, $description, $pages, $author, $author_surname;

    /**
     * Book constructor.
     * @param $id
     * @param $title
     * @param $description
     * @param $pages
     * @param $author
     * @param $author_surname
     */
    public function __construct($id, $title, $description, $pages, $author, $author_surname) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->pages = $pages;
        $this->author = $author;
        $this->author_surname = $author_surname;
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
    public function getTitle() {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getPages() {
        return $this->pages;
    }

    /**
     * @return mixed
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getAuthorSurname() {
        return $this->author_surname;
    }
    public function insert() {
        $connection = BookDB\Db::connection();
        $sql = "INSERT INTO books VALUES(NULL, ?, ?, ?, ?)";
        $statement =  $connection->prepare($sql);

        $statement->bindParam(1, $this->title);
        $statement->bindParam(2, $this->description);
        $statement->bindParam(3, $this->pages);
        $statement->bindParam(4, $this->author);

        $statement->execute();
    }

    public static function getAll() {
        $connection = BookDB\Db::connection();
        $sql = "SELECT b.*, a.name AS author_name FROM books b LEFT JOIN authors a ON b.author_id = a.id";
        $rows =  $connection->query($sql);
        $books = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($row["id"], $row["title"], $row["description"], $row["pages"], $row["author_name"], "");
        }
        return $books;
    }

    public static function delete($id) {
        $connection = BookDB\Db::connection();
        $sql = "DELETE FROM books WHERE id = $id";
        $connection->exec($sql);
    }

    public function update() {
        $connection = BookDB\Db::connection();
        $sql = "UPDATE employees SET title=?, description=?, pages=?, author_id=? WHERE id=".$this->id;
        $statement = $connection->prepare($sql);


        $statement->bindParam(1, $this->title);
        $statement->bindParam(2, $this->description);
        $statement->bindParam(3, $this->pages);
        $statement->bindParam(4, $this->author);

        $statement->execute();
    }

    public static function getById($id) {
        $connection = BookDB\Db::connection();
        $sql = "SELECT b.*, a.name AS author_name, a.surname AS author_surname FROM books b LEFT JOIN authors a ON b.author_id = a.id WHERE b.id = :id ";
        $statement = $connection->prepare($sql);
        $statement->bindParam("id", $id);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return new Book($row["id"], $row["title"], $row["description"], $row["pages"], $row["author_name"], $row["author_surname"]);
    }
}
