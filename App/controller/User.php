<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11-Aug-20
 * Time: 9:05 PM
 */

namespace controller;
use \Library\Database;

class User
{
    public static function create(\Entity\User $user)
    {
        $db = new Database();
        $db->connect();

        $fname = strtolower($user->fname);
//check if user name exists
        $db->prepare("SELECT id FROM USERS WHERE LOWER(fname) = ?");
        $db->result = $db->stmt->bind_param("s", $fname);
        $db->execute();

        $result = $db->stmt->get_result();
        if ($result->num_rows > 0) {
            throw new \Exception("User name already exits");
        }
//insert into db
        $db->prepare("INSERT INTO USERS (username, fname, lname, password, email, user_type, bio, picture) VALUE (?,?,?,?,?,?,?,?)");
        $db->result = $db->stmt->bind_param("ssssssss", $user->username, $user->fname, $user->lname, $user->password, $user->email, $user->type, $user->bio, $user->picture);
        $db->execute();

        return $db->result;

    }

    public static function getAll() {
        $db = new Database();
        $db->connect();

        $users = $db->select("SELECT * FROM USERS ORDER BY ID DESC");
        return $users;
    }

    public static function get($user_id) {
        $db = new Database();
        $db->connect();

        $db->prepare("SELECT * FROM USERS WHERE ID = ?");
        $db->result = $db->stmt->bind_param("i", $user_id);
        $db->execute();
        $result = $db->stmt->get_result();

        $users = $result->fetch_assoc();

        return $users;
    }

    public static function edit(\Entity\User $user) {
        $db = new Database();
        $db->connect();

        $db->prepare("UPDATE USERS SET name = ?, status = ?, date_updated = current_timestamp WHERE ID = ?");
        $db->result = $db->stmt->bind_param("sii", $user->name, $user->status, $user->id);
        $db->execute();

        return $db->result;
    }
}