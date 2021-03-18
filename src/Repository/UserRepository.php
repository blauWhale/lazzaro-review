<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

class UserRepository extends Repository
{
    protected $tableName = "user";

    public function userExists($email, $password)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE email=? and password=?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        $statement->bind_param('ss', $email, $password);

        if ($statement == false){
            throw new Exception($connection->error);
        }

        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        $doesUserExist = $result->num_rows != 0;

        return $doesUserExist;
    }

    public function readAll($max = 100)
    {
        $query = "SELECT * FROM {$this->tableName} LIMIT 0, $max";

        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        $statement->execute();

        if ($statement == false){
            throw new Exception($connection->error);
        }

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function create($username, $email, $password){

        $query = "SELECT id, password FROM {$this ->tableName} WHERE username = ?";
        $query2  = "INSERT INTO {$this ->tableName} (username, password, email) VALUES (?, ?, ?)";

        $connection = ConnectionHandler::getConnection();

        if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
            exit('Bitte alle Felder ausfüllen!');
        }
        if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
            exit('Bitte alle Felder ausfüllen!');
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            exit('Email ungültig!');
        }

        if (preg_match('/^[a-zA-Z0-9]{3,25}+$/', $_POST['username']) == 0) {
            exit('Username ungültig!');
        }

        if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 3) {
            exit('Passwort muss mindestens 3 Zeichen und maximal 20 Zeichen lang sein!');
        }

        if ($statement = $connection->prepare($query)) {
            $statement->bind_param('s', $_POST['username']);
            $statement->execute();
            $statement->store_result();

            if ($statement->num_rows > 0) {
                echo 'Dieser Benutzername existiert schon!';
            } else {

                if ($statement = $connection->prepare($query2)) {

                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $statement->bind_param('sss', $_POST['username'], $password, $_POST['email']);
                    $statement->execute();
                    echo 'Sie haben sich registriert, sie können sich jetzt einloggen!';
                }
            }
            $statement->close();
            $connection->close();
        }
    }
}
