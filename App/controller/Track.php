<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11-Aug-20
 * Time: 9:04 PM
 */

namespace controller;

use \Library\Database;

class Track
{
    public static function create(\Entity\Track $track)
    {
        $db = new Database();
        $db->connect();

        $name = strtolower($track->name);
//check if cohort name exists
        $db->prepare("SELECT id FROM TRACKS WHERE LOWER(name) = ?");
        $db->result = $db->stmt->bind_param("s", $name);
        $db->execute();

        $result = $db->stmt->get_result();
        if ($result->num_rows > 0) {
            throw new \Exception("Track name already exits");
        }
//insert into db
        $db->prepare("INSERT INTO TRACKS (name, level) VALUE (?,?)");
        $db->result = $db->stmt->bind_param("ss", $track->name, $track->level);
        $db->execute();

        return $db->result;

    }

    public static function getAll() {
        $db = new Database();
        $db->connect();

        $tracks = $db->select("SELECT * FROM TRACKS ORDER BY ID DESC");
        return $tracks;
    }

    public static function get($track_id) {
        $db = new Database();
        $db->connect();

        $db->prepare("SELECT * FROM TRACKS WHERE ID = ?");
        $db->result = $db->stmt->bind_param("i", $track_id);
        $db->execute();
        $result = $db->stmt->get_result();

        $category = $result->fetch_assoc();

        return $category;
    }

    public static function edit(\Entity\Track $track) {
        $db = new Database();
        $db->connect();

        $db->prepare("UPDATE TRACKS SET level = ?, name = ?, status = ?, date_updated = current_timestamp WHERE ID = ?");
        $db->result = $db->stmt->bind_param("ssii", $track->name, $track->level, $track->status, $track->id);
        $db->execute();

        return $db->result;
    }

}