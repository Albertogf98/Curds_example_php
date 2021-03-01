<?php
require_once(__DIR__."/../db/Db.php");

class Incidences {

    private $idTicket, $idUser;

    /**
     * Incidences constructor.
     * @param $idTicket
     * @param $idUser
     */
    public function __construct($idTicket, $idUser)
    {
        $this->idTicket = $idTicket;
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getIdTicket()
    {
        return (int) $this->idTicket;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return (int) $this->idUser;
    }

    public function insert() {
        $connection = IncidentDB\Db::connection();
        $sql = "INSERT INTO ticket_user VALUES (?, ?, null)";
        $statement = $connection->prepare($sql);

        $statement->bindParam(1, $this->idTicket);
        $statement->bindParam(2, $this->idUser);

        $statement->execute();
    }

}

