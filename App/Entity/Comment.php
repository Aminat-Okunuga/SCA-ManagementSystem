<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10-Aug-20
 * Time: 5:15 PM
 */

namespace Entity;
class Comment
{
    public $description;
    public $commentor_id;
    public $commentee_id;
    public $status;

    public function __construct($description, $commentee_id=1, $commentor_id=2, $status =1) {
        $this->description = $description;
        $this->commentee_id = $commentee_id;
        $this->commentor_id = $commentor_id;
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

    public function setCommentorId($commentor_id)
    {
        $this->commentor_id = $commentor_id;
    }

    public function getCommenteeId()
    {
        return $this->commentee_id;
    }

    public function setCommenteeId($commentee_id)
    {
        $this->commentee_id = $commentee_id;
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