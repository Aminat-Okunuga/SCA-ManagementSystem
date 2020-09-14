<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10-Aug-20
 * Time: 5:15 PM
 */
namespace Entity;
class Users
{
    public $username;
    public $password;
    public $email;
    public $user_id;

    public function __construct($username, $password, $email) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($fname) {
        $this->user_id = $user_id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}