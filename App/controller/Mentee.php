<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11-Aug-20
 * Time: 9:05 PM
 */

namespace controller;


use \Library\Database;
class Mentee
{
    public static function create(\Entity\Mentee $mentee)
    {
        $db = new Database();
        $db->connect();

        $mentee_id = $mentee->mentee_id;
//check if user name exists
        $db->prepare("SELECT id FROM MENTEES WHERE id = ?");
        $db->result = $db->stmt->bind_param("i", $mentee_id);
        $db->execute();

        $result = $db->stmt->get_result();
        if ($result->num_rows > 0) {
            throw new \Exception("Mentee name already exits");
        }
//insert into db
        $db->prepare("INSERT INTO MENTEES (cohort_id, track_id, mentor_id) VALUE (?,?,?)");
        $db->result = $db->stmt->bind_param("iii", $mentee->cohort_id, $mentee->track_id, $mentee->mentor_id);
        $db->execute();

        return $db->result;

    }

    // public static function getAll() {
    //     $db = new Database();
    //     $db->connect();

    //     $mentees = $db->select("SELECT * FROM MENTEES ORDER BY ID DESC");
    //     return $mentees;
    // }

    public static function getAll() {
        $db = new Database();
        $db->connect();

        $mentees = $db->select("SELECT MENTEES.*,  USERS.FNAME AS f_name, USERS.LNAME AS l_name, USERS.PICTURE AS picture, COHORTS.NAME AS cohort_name, TRACKS.NAME AS track_name FROM MENTEES JOIN USERS ON USERS.ID = MENTEES.ID JOIN COHORTS ON COHORTS.ID = MENTEES.COHORT_ID JOIN TRACKS ON TRACKS.ID = MENTEES.TRACK_ID ORDER BY MENTEES.ID DESC LIMIT 3");
        return $mentees;
    }


    public static function get($mentee_id) {
        $db = new Database();
        $db->connect();

        $db->prepare("SELECT * FROM MENTEES WHERE ID = ?");
        $db->result = $db->stmt->bind_param("i", $mentee_id);
        $db->execute();
        $result = $db->stmt->get_result();

        $mentees = $result->fetch_assoc();

        return $mentees;
    }

    public static function edit(\Entity\Mentee $mentee) {
        $db = new Database();
        $db->connect();

        $db->prepare("UPDATE MENTEES SET cohort_id = ?, track_id = ?, mentor_id = ?, date_updated = current_timestamp WHERE ID = ?");
        $db->result = $db->stmt->bind_param("iiii", $mentee->cohort_id, $mentee->track_id, $mentee->mentor_id, $mentee->mentee_id);
        $db->execute();

        return $db->result;
    }
}