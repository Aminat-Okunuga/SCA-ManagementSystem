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

        if (!isset($_POST['create_mentee']) && $error == null) {
            throw new \Exception("Invalid request format,. please try again");
        }

        $mentor_id = isset($_POST['mentor']) ? Form::sanitise($_POST['mentor']) : null;
        $cohort_id = isset($_POST['cohort']) ? Form::sanitise($_POST['cohort']) : null;
        $track_id = isset($_POST['track']) ? Form::sanitise($_POST['track']) : null;
        $status = isset($_POST['status']) ? Form::sanitise($_POST['status']) : null;
//        var_dump($_POST);exit();

        $mentor_idError = Validator::validateNumber('Mentor', $mentor_id);
        if ($mentor_idError != null) {
            throw new Exception($mentor_idError);
        }
        $cohort_idError = Validator::validateNumber('Cohort', $cohort_id);
        if ($cohort_idError != null) {
            throw new Exception($cohort_idError);
        }
        $track_idError = Validator::validateNumber('Track', $track_id);
        if ($track_idError != null) {
            throw new Exception($track_idError);
        }
//        $statusError = Validator::validateNumber('Status', $status);
//        if ($statusError != null) {
//            throw new Exception($statusError);
//        }


        $mentee = new Entity\Mentee($track_id, $cohort_id, $mentor_id);
        $result = controller\Mentee::create($mentee);

        if ($result !== true) {
            throw new \Exception("Mentee creation failed");
        }
        $message = "Mentee created successfully";
        echo $message;

    }
} catch (\Exception $e) {
    echo $e->getMessage();
    exit();
}

