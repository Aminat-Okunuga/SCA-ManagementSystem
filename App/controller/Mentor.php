<?php
namespace controller;

use \Library\Database;
class Mentor
{
    public static function create(\Entity\Mentor $mentor)
    {
        $db = new Database();
        $db->connect();

        $mentor_id = $mentor->mentor_id;
//check if user name exists
        $db->prepare("SELECT id FROM MENTORS WHERE id = ?");
        $db->result = $db->stmt->bind_param("i", $mentor_id);
        $db->execute();

        $result = $db->stmt->get_result();
        if ($result->num_rows > 0) {
            throw new \Exception("Mentor name already exits");
        }
//insert into db
        $db->prepare("INSERT INTO MENTORS (cohort_id, track_id) VALUE (?,?)");
        $db->result = $db->stmt->bind_param("ii", $mentor->cohort_id, $mentor->track_id);
        $db->execute();

        return $db->result;

    }

    public static function getAll() {
        $db = new Database();
        $db->connect();

        $mentees = $db->select("SELECT MENTORS.*,  USERS.FNAME AS f_name, USERS.LNAME AS l_name, USERS.PICTURE AS picture, COHORTS.NAME AS cohort_name, TRACKS.NAME AS track_name FROM MENTORS JOIN USERS ON USERS.ID = MENTORS.ID JOIN COHORTS ON COHORTS.ID = MENTORS.COHORT_ID JOIN TRACKS ON TRACKS.ID = MENTORS.TRACK_ID ORDER BY MENTORS.ID DESC LIMIT 2");
        return $mentees;
    }


    public static function get($mentor_id) {
        $db = new Database();
        $db->connect();

        $db->prepare("SELECT * FROM MENTORS WHERE ID = ?");
        $db->result = $db->stmt->bind_param("i", $mentor_id);
        $db->execute();
        $result = $db->stmt->get_result();

        $mentors = $result->fetch_assoc();

        return $mentors;
    }

    public static function edit(\Entity\Mentor $mentor) {
        $db = new Database();
        $db->connect();

        $db->prepare("UPDATE MENTORS SET cohort_id = ?, track_id = ?, status = ?, date_updated = current_timestamp WHERE ID = ?");
        $db->result = $db->stmt->bind_param("iiii", $mentor->cohort_id, $mentor->track_id, $mentor->status, $mentor->id);
        $db->execute();

        return $db->result;
    }
}