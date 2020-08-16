<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10-Aug-20
 * Time: 5:15 PM
 */

namespace Entity;
class Mentor

{
    public $mentor_id;
    public $cohort_id;
    public $track_id;
    public $status;

    public function __construct($cohort_id, $track_id) {
//        $this->mentor_id = $mentor_id;
        $this->track_id = $track_id;
        $this->cohort_id = $cohort_id;
    }

    public function getMentorId()
    {
        return $this->mentor_id;
    }

    public function setMentorId($mentor_id)
    {
        $this->mentor_id = $mentor_id;
    }

    public function getCohortId()
    {
        return $this->cohort_id;
    }

    public function setCohortId($cohort_id)
    {
        $this->cohort_id = $cohort_id;
    }

    public function getTrackId()
    {
        return $this->track_id;
    }

    public function setTrackId($track_id)
    {
        $this->track_id = $track_id;
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