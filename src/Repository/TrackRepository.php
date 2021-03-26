<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;


class TrackRepository
{
    protected $tableName = "track";

    public function readById($id)
    {
        // Query erstellen
        $query = "SELECT * FROM {$this->tableName} WHERE id=?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        $statement->bind_param('i', $id);

        if ($statement == false){
            throw new Exception($connection->error);
        }

        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();

        // Datenbankressourcen wieder freigeben
        $result->close();

        // Den gefundenen Datensatz zurückgeben
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

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM {$this->tableName} WHERE id=?";

        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        $statement->bind_param('i', $id);

        if ($statement == false){
            throw new Exception($connection->error);
        }

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
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

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row[$selector];
        }

        return $rows;
    }
}
