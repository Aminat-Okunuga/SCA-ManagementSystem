<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10-Aug-20
 * Time: 5:15 PM
 */

class Comment
{
    public $description;
    public $commentor_id;
    public $commentee_id;
    public $date_created;
    public $date_updated;
    public $status;

    public function __construct($description, $commentee_id, $commentor_id, $date_created, $date_updated, $status) {
        $this->description = $description;
        $this->commentee_id = $commentee_id;
        $this->commentor_id = $commentor_id;
        $this->date_created = $date_created;
        $this->date_updated = $date_updated;
        $this->status = $status;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function getCommentorId()
    {
        return $this->commentor_id;
    }

    /**
     * @param mixed $commentor_id
     */
    public function setCommentorId($commentor_id)
    {
        $this->commentor_id = $commentor_id;
    }

    /**
     * @return mixed
     */
    public function getCommenteeId()
    {
        return $this->commentee_id;
    }

    /**
     * @param mixed $commentee_id
     */
    public function setCommenteeId($commentee_id)
    {
        $this->commentee_id = $commentee_id;
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

    public function setStatus($status)
    {
        $this->status = $status;
    }

}