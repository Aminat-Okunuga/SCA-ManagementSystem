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

    if (!isset($_POST['create_track']) && $error == null) {
        throw new \Exception("Invalid request format,. please try again");
    }

    $name = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;
    $level = isset($_POST['level']) ? Form::sanitise($_POST['level']) : null;

    $nameError = Validator::validateText('Name', $name, 30);
    if ($nameError != null) {
        throw new Exception($nameError);
    }

    $track = new Entity\Track($name, $level);
    $result = controller\Track::create($track);

    if ($result !== true) {
        throw new \Exception("Track creation failed");
    }
    $message = "Track created successfully";
    echo $message;

}
} catch (\Exception $e) {
    echo $e->getMessage();
    exit();
}

