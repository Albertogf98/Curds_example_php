<?php
require_once(__DIR__."/../db/Db.php");

class User {

    private $id, $name, $email, $password, $user_type;

    /**
     * User constructor.
     * @param $id
     * @param $name
     * @param $email
     * @param $password
     * @param $user_type
     */
    public function __construct($id, $name, $email, $password, $user_type)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->user_type = $user_type;
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
    public function getEmail()
    {
        return $this->email;
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
    public function getUserType()
    {
        return $this->user_type;
    }

    public function insert() {
        $connection = IncidentDB\Db::connection();
        $sql = "INSERT INTO users VALUES (NULL, ?, ?, ?, ?)";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->name);
        $statement->bindParam(2, $this->email);
        $statement->bindParam(3, $this->password);
        $statement->bindParam(4, $this->user_type);

        $statement->execute();
    }

    public static function getAll() {
        $connection = IncidentDB\Db::connection();
        $sql = "SELECT * FROM users";
        $rows = $connection->query($sql);
        $users = [];

        while ($row = $rows->fetch()) {
            $users[] = new User("", $row["name"], $row["email"], $row["password"], $row["user_type"]);
        }
        return $users;
    }

    public static function getByEmail($email) {
        $connection = IncidentDB\Db::connection();
        $rows = $connection->prepare("SELECT * FROM users WHERE email = :email");
        $rows->bindParam("email", $email);
        $rows->execute();
        $users = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new User($row["id"], $row["name"], $row["email"], $row["password"],  $row["user_type"]);
        }
        return $users;
    }
}
//$user = new User("", "Jorge", "jorge@incidencias.com", "123","user");
//$result = User::getByEmail("alberto@incidencias.es");
