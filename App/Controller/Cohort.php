<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11-Aug-20
 * Time: 9:04 PM
 */

namespace controller;

use \Library\Database;

class Cohort
{
    public static function create(\Entity\Cohort $cohort)
    {
        $db = new Database();
        $db->connect();

        $name = strtolower($cohort->name);
        $start_date = $cohort->start_date;
        $end_date = $cohort->end_date;
//check if cohort name exists
        $db->prepare("SELECT id FROM COHORTS WHERE LOWER(name) = ?");
        $db->result = $db->stmt->bind_param("s", $name);
        $db->execute();

        $result = $db->stmt->get_result();
        if ($result->num_rows > 0) {
            throw new \Exception("Cohort name already exits");
        }
//insert into db
        $db->prepare("INSERT INTO cohorts (name, start_date, end_date) VALUE (?,?,?)");
        $db->result = $db->stmt->bind_param("sss", $cohort->name, $cohort->start_date, $cohort->end_date);
        $db->execute();

        return $db->result;

    }

    public static function getAll() {
        $db = new Database();
        $db->connect();

        $cohorts = $db->select("SELECT * FROM COHORTS ORDER BY ID DESC");
        return $cohorts;
    }

    public static function get($cohort_id) {
        $db = new Database();
        $db->connect();

        $db->prepare("SELECT * FROM COHORTS WHERE ID = ?");
        $db->result = $db->stmt->bind_param("i", $cohort_id);
        $db->execute();
        $result = $db->stmt->get_result();

        $cohorts = $result->fetch_assoc();

        return $cohorts;
    }

    public static function edit(\Entity\Cohort $cohort) {
        $db = new Database();
        $db->connect();

        $cohort_id = $cohort->cohort_id;

        $db->prepare("UPDATE COHORTS SET name = ?, status = ?, date_updated = current_timestamp WHERE ID = ?");
        $db->result = $db->stmt->bind_param("sii", $cohort->name, $cohort->status, $cohort_id);
        $db->execute();

        return $db->result;
    }

}