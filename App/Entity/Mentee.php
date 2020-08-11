<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10-Aug-20
 * Time: 5:15 PM
 */

class Mentee
{
    public $mentor_id;
    public $cohort_id;
    public $mentee_id;
    public $track_id;
    public $date_created;
    public $date_updated;
    public $status;

    public function __construct($mentor_id, $mentee_id, $track_id, $cohort_id, $date_created, $date_updated, $status) {
        $this->mentee_id = $mentee_id;
        $this->mentor_id = $mentor_id;
        $this->track_id = $track_id;
        $this->cohort_id = $cohort_id;
        $this->date_created = $date_created;
        $this->date_updated = $date_updated;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getMentorId()
    {
        return $this->mentor_id;
    }

    /**
     * @param mixed $mentor_id
     */
    public function setMentorId($mentor_id)
    {
        $this->mentor_id = $mentor_id;
    }

    /**
     * @return mixed
     */
    public function getCohortId()
    {
        return $this->cohort_id;
    }

    /**
     * @param mixed $cohort_id
     */
    public function setCohortId($cohort_id)
    {
        $this->cohort_id = $cohort_id;
    }

    /**
     * @return mixed
     */
    public function getMenteeId()
    {
        return $this->mentee_id;
    }

    /**
     * @param mixed $mentee_id
     */
    public function setMenteeId($mentee_id)
    {
        $this->mentee_id = $mentee_id;
    }

    /**
     * @return mixed
     */
    public function getTrackId()
    {
        return $this->track_id;
    }

    /**
     * @param mixed $track_id
     */
    public function setTrackId($track_id)
    {
        $this->track_id = $track_id;
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