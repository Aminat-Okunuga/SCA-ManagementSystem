<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12-Aug-20
 * Time: 8:33 AM
 */
include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;


try {
    $error = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!isset($_POST['edit_mentee']) && $error == null) {
            throw new \Exception("Invalid request format,. please try again");
        }

        $cohort = isset($_POST['cohort']) ? Form::sanitise($_POST['cohort']) : null;
        $mentor_id = isset($_POST['mentor']) ? Form::sanitise($_POST['mentor']) : null;
        $mentee_id = isset($_POST['mentee_id']) ? Form::sanitise($_POST['mentee_id']) : null;
        $track = isset($_POST['track']) ? Form::sanitise($_POST['track']) : null;
        $status = isset($_POST['status']) ? Form::sanitise($_POST['status']) : null;

        $cohortError = Validator::validateNumber('Cohort', $cohort);
        if ($cohortError != null) {
            throw new Exception($cohortError);
        }
        $trackError = Validator::validateNumber('Track', $track);
        if ($trackError != null) {
            throw new Exception($trackError);
        }

        $mentee = new Entity\Mentee($cohort, $track, $mentor_id);
        $mentee->status = $status;
//        $track->level = $level;
        $mentee->track_id = $track;
        $mentee->mentee_id = $mentee_id;
        $result = controller\Mentee::edit($mentee);


        if ($result !== true) {
            throw new \Exception("Mentee creation failed");
        }
        $success = "Mentee edited successfully";
//        header('location: view.php');
        echo $success;


    }
} catch (\Exception $e) {
    echo $e->getMessage();
}

