<?php
include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;


try {
    $error = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!isset($_POST['edit_track']) && $error == null) {
            throw new \Exception("Invalid request format,. please try again");
        }

        $name = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;
        $level = isset($_POST['level']) ? Form::sanitise($_POST['level']) : null;
        $track_id = isset($_POST['track_id']) ? Form::sanitise($_POST['track_id']) : null;
        $status = isset($_POST['status']) ? Form::sanitise($_POST['status']) : null;

        $nameError = Validator::validateText('Name', $name, 30);
        if ($nameError != null) {
            throw new Exception($nameError);
        }
        $levelError = Validator::validateText('Level', $level, 30);
        if ($levelError != null) {
            throw new Exception($levelError);
        }

        $track = new Entity\Track($level, $name);
        $track->status = $status;
       $track->level = $level;
        $track->track_id = $track_id;
        $result = controller\Track::edit($track);


        if ($result !== true) {
            throw new \Exception("Track creation failed");
        }
        $success = "Track edited successfully";
//        header('location: view.php');
        echo $success;


    }
} catch (\Exception $e) {
    echo $e->getMessage();
}

