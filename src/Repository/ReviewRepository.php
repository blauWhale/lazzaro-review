<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;


class ReviewRepository extends Repository
{
    protected $tableName = "review";

    public function readAll($max = 100)
    {
        $query = "SELECT r.id as review_id, t.id as t_id, r.*, t.* FROM {$this->tableName} r JOIN track t on t.id=r.track_id order by r.id DESC LIMIT 0 , $max";

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
        $data = array(
            'track'=>array(),
            'review'=>array()
        );
        while ($row = $result->fetch_object()) {
            $data ['review'] [] = array(
                'id'=>$row->review_id,
                'rating'=>$row->rating,
                'content'=>$row->content,
                'user_id'=>$row->user_id,
                'track_id'=>$row->track_id

            );
            if(!array_key_exists($row->t_id, $data['track'])){
                $data ['track'] [$row->t_id] = array(
                    'id'=>$row->t_id,
                    'trackname'=>$row->trackname,
                    'producer_name'=>$row->producer_name,
                    'artist_name'=>$row->artist_name,
                    'genre'=>$row->genre,
                    'release'=>$row->release_year

                );
            }
        }

        return $data;
    }
}
