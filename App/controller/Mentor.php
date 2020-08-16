<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11-Aug-20
 * Time: 9:05 PM
 */

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

        $mentors = $db->select("SELECT * FROM MENTORS ORDER BY ID DESC");
        return $mentors;
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