<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10-Aug-20
 * Time: 5:15 PM
 */

class User
{
    public $name;
    public $username;
    public $fname;
    public $lname;
    public $password;
    public $email;
    public $type;
    public $date_created;
    public $date_updated;
    public $status;

    public function __construct($name, $username, $fname, $lname, $password, $email, $type, $date_created, $date_updated, $status) {
        $this->name = $name;
        $this->username = $username;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->password = $password;
        $this->email = $email;
        $this->type = $type;
        $this->date_created = $date_created;
        $this->date_updated = $date_updated;
        $this->status = $status;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDateCreated()
    {
        return $this->date_created;
    }

    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
    }

    public function getDateUpdated()
    {
        return $this->date_updated;
    }

    public function setDateUpdated($date_updated)
    {
        $this->date_updated = $date_updated;
    }

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

}