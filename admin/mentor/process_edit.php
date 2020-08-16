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

        if (!isset($_POST['edit_mentor']) && $error == null) {
            throw new \Exception("Invalid request format,. please try again");
        }

        $cohort = isset($_POST['cohort']) ? Form::sanitise($_POST['cohort']) : null;
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

        $mentor = new Entity\Mentor($cohort, $track);
        $mentor->status = $status;
//        $track->level = $level;
        $mentor->track_id = $track;
        $result = controller\Mentor::edit($mentor);


        if ($result !== true) {
            throw new \Exception("Mentor creation failed");
        }
        $success = "Mentor edited successfully";
//        header('location: view.php');
        echo $success;


    }
} catch (\Exception $e) {
    echo $e->getMessage();
}

