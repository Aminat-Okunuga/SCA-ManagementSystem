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

    public static function getAll() {
        $db = new Database();
        $db->connect();

        $mentees = $db->select("SELECT * FROM MENTEES ORDER BY ID DESC");
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