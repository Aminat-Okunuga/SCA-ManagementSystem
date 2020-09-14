<?php
namespace controller;
use \Library\Database;

class Users
{
     public static function login(\Entity\Users $users)
        {
            $db = new Database();
            $db->connect();

            $username = strtolower($users->username);
            $email = strtolower($users->email);
            $password = strtolower($users->password);
            
    //check if user name exists
            $db->prepare("SELECT id FROM USERS WHERE LOWER(username) = ? AND email = ? AND password = ?");
            $db->result = $db->stmt->bind_param("sss", $username, $email, $password);
            $db->execute();

            $result = $db->stmt->get_result();
            if ($result->num_rows > 0) {
            return $result;
            }
            return $result;
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
}