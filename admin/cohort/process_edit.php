<?php
include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;


try {
    $error = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!isset($_POST['edit_cohort']) && $error == null) {
            throw new \Exception("Invalid request format,. please try again");
        }

        $name = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;
        $cohort_id = isset($_POST['cohort_id']) ? Form::sanitise($_POST['cohort_id']) : null;
        $status = isset($_POST['status']) ? Form::sanitise($_POST['status']) : null;

        $nameError = Validator::validateText('Name', $name, 30);
        if ($nameError != null) {
            throw new Exception($nameError);
        }

        $cohort = new Entity\Cohort($name);
        var_dump(($cohort));
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

