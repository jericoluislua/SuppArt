<?php

require_once '../lib/Repository.php';
require_once 'UserRepository.php';
class CommentRepository extends Repository
{
    protected $tableName = 'comments';
    protected $tableName1 = 'post';
    protected $tableName2 = 'user';
    /**
     * @param $postid
     * @return array
     * @throws Exception
     */
    //returns all comments of a post
    public function getComments($postid){
        $query = "SELECT * FROM $this->tableName where postid = ? ORDER BY id DESC";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $postid);
        $statement->execute();
        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        $rows = [];
        $userRepository = new UserRepository();
        while ($row = $result->fetch_object()) {
            $user = $userRepository->readById($row->userid);
            $row->user = $user;
            $rows[] = $row;
        }
        return $rows;
    }
    /**
     * @param $userid
     * @param $postid
     * @param $comment
     * @param $time
     * @return bool
     */
    //saves comment in database
    public function createComment($userid, $postid, $comment, $time){
        $query = "INSERT INTO $this->tableName (userid, postid, comment, time) VALUES (?, ?, ?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('iiss', $userid, $postid, $comment, $time);
        if (!$statement->execute()) {
            return false;
        }
        return ConnectionHandler::getConnection()->insert_id;
    }

}