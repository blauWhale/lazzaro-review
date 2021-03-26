<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;


class CommentRepository extends Repository
{
    protected $tableName = "comment";

    public function create($comment_content, $date, $user_id, $review_id)
    {

        $query = "INSERT INTO {$this ->tableName} (content, date, user_id, review_id) VALUES (?, ?, ?, ?)";

        $connection = ConnectionHandler::getConnection();

        if ($statement = $connection->prepare($query)) {
            $statement->bind_param('ssii', $comment_content, $date, $user_id, $review_id);
            $statement->execute();
            return $statement->insert_id;
        }

        $statement->close();
    }


    public function readAllByReviewId($max = 100, $id)
    {
        $query = "SELECT comment.*,  user.id as userId , user.username FROM {$this ->tableName} JOIN user ON comment.user_id=user.id WHERE review_id = $id LIMIT 0, $max;";

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
            'comment' => array(),
            'user' => array()
        );
        while ($row = $result->fetch_object()) {
            $data ['comment'] [] = array(
                'id' => $row->id,
                'content' => $row->content,
                'date' => $row->date,
                'user_id' => $row->user_id,
                'review_id' => $row->review_id,

            );
            if (!array_key_exists($row->userId, $data['user'])) {
                $data ['user'] [$row->userId] = array(
                    'id' => $row->userId,
                    'username' => $row->username,

                );
            }
        }

        return $data;

    }
}
