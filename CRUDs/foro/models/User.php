<?php

require_once( __DIR__ . "/../db/db.php");

class User {
    private $id, $name, $user, $password, $email;

    /**
     * User constructor.
     * @param $id
     * @param $name
     * @param $user
     * @param $password
     * @param $email
     */
    public function __construct($id, $name, $user, $password, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
        $this->email = $email;
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

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function insert() {
        $conn = DatabaseConnection::connectToDb();
        $stm = $conn->prepare("INSERT INTO usuarios VALUES (null, ?, ?, ?, ?)");

        $stm->bindParam(1, $this->name);
        $stm->bindParam(2, $this->user);
        $stm->bindParam(3, $this->password);
        $stm->bindParam(4, $this->email);

        $stm->execute();
    }

    public static function getAll() {
        $conn = DatabaseConnection::connectToDb();
        $rows = $conn->query("SELECT * FROM usuarios");
        $users = [];

        while ($row = $rows->fetch()) {
            $users[] = new User($row["id"],$row["nombre"], $row["usuario"], $row["clave"], $row["email"]);
        }
        return $users;
    }

    public static function delete($id) {
        $conn = DatabaseConnection::connectToDb();
        $conn->exec("DELETE FROM usuarios WHERE id = $id");
    }

    public function update() {
        $conn = DatabaseConnection::connectToDb();
        $sql = "UPDATE usuarios SET nombre=?, usuario=?, clave=?, email=? WHERE id=".$this->id;
        $stm = $conn->prepare($sql);

        $stm->bindParam(1, $this->name);
        $stm->bindParam(2, $this->user);
        $stm->bindParam(3, $this->password);
        $stm->bindParam(4, $this->email);


        $stm->execute();
    }

    public static function getById($id) {
        $conn = DatabaseConnection::connectToDb();
        $select = $conn->prepare("SELECT * FROM usuarios WHERE id=:id");
        $id = (int) $id;
        $select->bindValue("id", $id);
        $select->execute();
        $userDB = $select->fetch(PDO::FETCH_ASSOC);
        return new User(
            $userDB["id"],
            $userDB["nombre"],
            $userDB["usuario"],
            $userDB["clave"],
            $userDB["email"]
        );
    }


}