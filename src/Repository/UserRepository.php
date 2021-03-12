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
}
