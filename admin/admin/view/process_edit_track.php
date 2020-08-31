<?php
include_once '../../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;


try {
    $error = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!isset($_POST['edit_track']) && $error == null) {
            throw new \Exception("Invalid request format,. please try again");
        }

        $description = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;
       $track_id = isset($_POST['track_id']) ? Form::sanitise($_POST['track_id']) : null;
        $status = isset($_POST['status']) ? Form::sanitise($_POST['status']) : null;

        $descriptionError = Validator::validateText('Name', $description, 30);
        if ($descriptionError != null) {
            throw new Exception($descriptionError);
        }

        $track = new Entity\Track($description);
        $track->status = $status;
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

