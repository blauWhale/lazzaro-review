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

    public function create($trackname, $producer_name, $artist_name, $genre, $release_year){

        $query  = "INSERT INTO {$this ->tableName} (trackname, producer_name, artist_name, genre, release_year) VALUES (?, ?, ?, ?, ?)";

        $connection = ConnectionHandler::getConnection();

        if (!isset($_POST['trackname']) || !isset($_POST['producer_name']) || !isset($_POST['artist_name']) || !isset($_POST['genre']) || !isset($_POST['release_year'])) {
            exit('Die Daten konnten nicht abgesendet werden!');
        }
        if (empty($_POST['trackname']) || empty($_POST['producer_name']) || empty($_POST['artist_name']) || empty($_POST['genre']) || empty($_POST['release_year'])) {
            exit('Bitte alle Felder ausfüllen!');
        }

        /*
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if(isset($_POST["createTrack"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
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
        */


        if ($statement = $connection->prepare($query)) {
            $statement->bind_param('sssss', $_POST['trackname'], $_POST['producer_name'], $_POST['artist_name'], $_POST['genre'] , $_POST['release_year'] );
            $statement->execute();
        }

        $statement->close();
        $connection->close();
    }
}
