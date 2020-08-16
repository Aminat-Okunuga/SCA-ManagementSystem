<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11-Aug-20
 * Time: 9:05 PM
 */

namespace controller;
use \Library\Database;

class Comment
{
    public static function create(\Entity\Comment $comment)
    {
        $db = new Database();
        $db->connect();

        $description = strtolower($comment->description);
//check if cohort name exists
        $db->prepare("SELECT id FROM COMMENTS WHERE LOWER(description) = ?");
        $db->result = $db->stmt->bind_param("s", $description);
        $db->execute();

        $result = $db->stmt->get_result();
        if ($result->num_rows > 0) {
            throw new \Exception("Comment name already exits");
        }
//insert into db
        $db->prepare("INSERT INTO COMMENTS (description) VALUE (?)");
        $db->result = $db->stmt->bind_param("s", $comment->description);
        $db->execute();

        return $db->result;

    }

    public static function getAll() {
        $db = new Database();
        $db->connect();

        $comments = $db->select("SELECT * FROM COMMENTS ORDER BY ID DESC");
        return $comments;
    }

    public static function get($comment_id) {
        $db = new Database();
        $db->connect();

        $db->prepare("SELECT * FROM COMMENTS WHERE ID = ?");
        $db->result = $db->stmt->bind_param("i", $comment_id);
        $db->execute();
        $result = $db->stmt->get_result();

        $cohorts = $result->fetch_assoc();

        return $cohorts;
    }

    public static function edit(\Entity\Comment $comment) {
        $db = new Database();
        $db->connect();

        $db->prepare("UPDATE COMMENTS SET description = ?, status = ?, date_updated = current_timestamp WHERE ID = ?");
        $db->result = $db->stmt->bind_param("sii", $comment->description, $comment->status, $comment->id);
        $db->execute();

        return $db->result;
    }

}