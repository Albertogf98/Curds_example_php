<?php
namespace Models;

require_once(__DIR__."/../../vendor/autoload.php");

//COMANDO PARA EL AUTOLOAD -> composer dump-autoload

class User
{
    private $id, $name, $email, $password;

    /**
     * User constructor.
     * @param $id
     * @param $name
     * @param $email
     * @param $password
     */
    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
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

    public function insert() {
        $connection = \ConfigurationDB\Database::connection();
        $sql = "INSERT INTO users VALUES(null, ?, ?, ?)";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->name);
        $statement->bindParam(2, $this->email);
        $statement->bindParam(3, $this->password);
        $statement->execute();
    }

    public static function getByEmail($email) {
        $connection = \ConfigurationDB\Database::connection();
        $sql = "SELECT * FROM users WHERE email = ?";
        $rows = $connection->prepare($sql);
        $rows->bindParam(1, $email);
        $rows->execute();
        $users = [];

        while ($row = $rows->fetch())//PDO::FETCH_ASSOC
            $users[] = new User($row["id"],$row["name"], $row["email"], $row["password"]);

        return $users;
    }
}