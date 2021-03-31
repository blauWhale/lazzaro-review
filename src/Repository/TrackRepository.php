<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;


class TrackRepository
{
    protected $tableName = "track";

    public function readById($id)
    {

        $query = "SELECT * FROM {$this->tableName} WHERE id=?";


        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        $statement->bind_param('i', $id);

        if ($statement == false){
            throw new Exception($connection->error);
        }


        $statement->execute();


        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }


        $row = $result->fetch_object();

        $result->close();

        return $row;
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

        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }


    public function create($trackname, $producer_name, $artist_name, $genre, $release_year, $filename){

        $query  = "INSERT INTO {$this ->tableName} (trackname, producer_name, artist_name, genre, release_year) VALUES (?, ?, ?, ?, ?)";

        $connection = ConnectionHandler::getConnection();



        if ($statement = $connection->prepare($query)) {
            $statement->bind_param('sssss', $trackname, $producer_name, $artist_name, $genre , $release_year );
            $statement->execute();
        }

        $statement->close();
        $connection->close();
    }

    public function readAllBySelector($max = 100, $selector)
    {

        if(empty($selector)){
            return array();
        }


        $query = "SELECT DISTINCT $selector FROM {$this->tableName} LIMIT 0, $max";

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
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row[$selector];
        }

        return $rows;
    }
}
