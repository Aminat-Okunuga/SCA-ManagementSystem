<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10-Aug-20
 * Time: 5:15 PM
 */

class Track
{
    public $name;
    public $level;
    public $date_created;
    public $date_updated;
    public $status;

    public function __construct($name, $level, $date_created, $date_updated, $status) {
        $this->name = $name;
        $this->level = $level;
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

    public function setStatus($status)
    {
        $this->status = $status;
    }

}