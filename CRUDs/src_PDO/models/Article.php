<?php

require_once __DIR__ . "/../db/db.php";

class Article {
    private $id, $title, $publicationDate, $content, $image;

    public function __construct($id, $title, $publicationDate, $content, $image) {
        $this->id = $id;
        $this->title = $title;
        $this->publicationDate = $publicationDate;
        $this->content = $content;
        $this->image = $image;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getPublicationDate() {
        return $this->publicationDate;
    }

    public function getContent() {
        return $this->content;
    }

    public function getImage() {
        return $this->image;
    }

    public function insertArticle() {
        $conn = BlogDB::getConnection();
        $stm = $conn->prepare("INSERT INTO articles VALUES (null, ?, ?, ?, ?)");

        $stm->bindParam(1, $this->title);
        $stm->bindParam(2, $this->publicationDate);
        $stm->bindParam(3, $this->content);
        $stm->bindParam(4, $this->image);

        $stm->execute();
    }

    public static function getAllArticles() {
        $conn = BlogDB::getConnection();
        $rows = $conn->query("SELECT * FROM articles");
        $articles = [];

        while ($row = $rows->fetch()) {
            $articles[] = new Article($row["id"],$row["title"], $row["publication_date"], $row["content"], $row["image"]);
        }
        return $articles;
    }

    public static function deleteArticle($id) {
        $conn = BlogDB::getConnection();
        $conn->exec("DELETE FROM articles WHERE id = $id");
    }

    public function updateArticle() {
        $conn = BlogDB::getConnection();
        $sql = "UPDATE articles SET title=?, publication_date=?, content=?, image=? WHERE id=".$this->id;
        $stm = $conn->prepare($sql);

        $stm->bindParam(1, $this->title);
        $stm->bindParam(2, $this->publicationDate);
        $stm->bindParam(3, $this->content);
        $stm->bindParam(4, $this->image);

        $stm->execute();
    }

    public static function getArticleById($id) {
        $conn = BlogDB::getConnection();
        $select = $conn->prepare("SELECT * FROM articles WHERE id=:id");
        $id = (int) $id;
        $select->bindValue("id",$id);
        $select->execute();
        $articleDB = $select->fetch(PDO::FETCH_ASSOC);
        return new Article(
            $articleDB["id"],
            $articleDB["title"],
            $articleDB["publication_date"],
            $articleDB["content"],
            $articleDB["image"]
        );
    }

}