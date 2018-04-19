<?php

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'user';
    protected $id = 'id';
    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     * @param $admin Wert für die Spalte admin
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($firstName, $lastName, $email, $password, $admin)
    {
        $isAdmin = false;
        $password = sha1($password);
        $query = "INSERT INTO $this->tableName (firstName, lastName, email, password, admin) VALUES (?, ?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        if($admin === "flourish"){
            $isAdmin = 1;

        }
        else if($admin === ""){
            $isAdmin = 0;

        }


        $statement->bind_param('ssssi', $firstName, $lastName, $email, $password, $isAdmin);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }



        return $statement->insert_id;
    }

    public function login( $email, $password)
    {
        $password = sha1($password);

        $query = "SELECT * FROM $this->tableName WHERE email = ? AND password = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->bind_param('ss', $email, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }



        //if($row == 1){
        //    echo 'found';
        //} else {
        //    echo 'not found';
        //}

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        $result = $statement->get_result();
        $resultrows = $result->num_rows;


        echo $resultrows;
        return $resultrows;
    }
}
