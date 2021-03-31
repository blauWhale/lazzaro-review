<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

class UserRepository extends Repository
{
    protected $tableName = "user";

    public function login($email, $password)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE email=?";

        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        $statement->bind_param('s', $email);

        if ($statement == false){
            throw new Exception($connection->error);
        }


        $statement->execute();

        $result = $statement->get_result();
        if($result->num_rows > 0){
            $user = $result->fetch_object();

            if(password_verify($password, $user->password)){
                return $user;
            }
        }
    }

    public function readAll($max = 100, $whereClause = "")
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

        if ($statement = $connection->prepare($query)) {
            $statement->bind_param('s', $_POST['username']);
            $statement->execute();
            $statement->store_result();

            if ($statement->num_rows > 0) {
                echo 'Dieser Benutzername existiert schon!';
            } else {

                if ($statement = $connection->prepare($query2)) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $statement->bind_param('sss', $username, $password, $email);
                    $statement->execute();
                    echo 'Sie haben sich registriert, sie können sich jetzt einloggen!';
                }
            }
            $statement->close();
            $connection->close();
        }
    }
}
