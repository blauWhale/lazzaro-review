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


    public function readAllByReviewId($id)
    {
        return $this->readAll(100, "review_id=$id");


    }
}
