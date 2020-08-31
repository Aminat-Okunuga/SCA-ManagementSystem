<?php
include_once '../../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;


try {
    $error = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!isset($_POST['edit_cohort']) && $error == null) {
            throw new \Exception("Invalid request format,. please try again");
        }

        $description = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;
       $cohort_id = isset($_POST['cohort_id']) ? Form::sanitise($_POST['cohort_id']) : null;
        $status = isset($_POST['status']) ? Form::sanitise($_POST['status']) : null;

        $descriptionError = Validator::validateText('Name', $description, 30);
        if ($descriptionError != null) {
            throw new Exception($descriptionError);
        }

        $cohort = new Entity\Cohort($description);
        $cohort->status = $status;
         $cohort->cohort_id = $cohort_id;
        $result = controller\Cohort::edit($cohort);

        if ($result !== true) {
            throw new \Exception("Cohort creation failed");
        }
        $success = "Cohort edited successfully";
//        header('location: view.php');
        echo $success;

    }
} catch (\Exception $e) {
    echo $e->getMessage();
}

