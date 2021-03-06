<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10-Aug-20
 * Time: 5:15 PM
 */
namespace Entity;
class User
{
    public $username;
    public $fname;
    public $lname;
    public $password;
    public $email;
    public $user_type;
    public $bio;
    public $picture;
    public $status;
    public $user_id;

    public function __construct($username, $fname, $lname, $password, $email, $user_type, $bio, $picture) {
        $this->username = $username;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->password = $password;
        $this->bio = $bio;
        $this->user_type = $user_type;
        $this->picture = $picture;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($fname) {
        $this->user_id = $user_id;
    }

    public function getFName() {
        return $this->fname;
    }

    public function setFName($fname) {
        $this->fname = $fname;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getLname()
    {
        return $this->lname;
    }

    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUserType()
    {
        return $this->user_type;
    }

    public function setType($user_type)
    {
        $this->user_type = $user_type;
    }

    public function getBio()
    {
        return $this->bio;
    }

    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

}