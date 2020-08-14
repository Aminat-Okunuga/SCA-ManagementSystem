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

        if (!isset($_POST['edit_user']) && $error == null) {
            throw new \Exception("Invalid request format,. please try again");
        }

        if(isset($_FILES['picture']) && !empty($_FILES['picture']['name'])) {
            if($_FILES['picture']['error'] == 1) {
                throw new \Exception("File size must be less than 2 MB");
            }

            if($_FILES['picture']['error'] != 0) {
                throw new \Exception("Please select a picture and try again");
            }

            if(!file_exists($_FILES['picture']['tmp_name'])) {
                throw new \Exception("Please select a picture and try again");
            }

            $uploaded_file = pathinfo($_FILES['picture']['name']);
            $valid_extensions = array('jpg', 'jpeg', 'png');

            if(!in_array($uploaded_file['extension'], $valid_extensions)) {
                throw new \Exception("Please select a valid picture");
            }

            $relative_dest = "pictures/" . $_FILES['picture']['name'];

            $dest = __DIR__ . "/../../$relative_dest";

            if (!move_uploaded_file($_FILES['picture']['tmp_name'], $dest)) {
                echo 'File upload failed';
            }
            $picture = $relative_dest;
        } else {
            $picture = isset($_POST['current_picture']) ? Form::sanitise($_POST['current_picture']) : null;
        }


        $username = isset($_POST['username']) ? Form::sanitise($_POST['username']) : null;
        $fname = isset($_POST['fname']) ? Form::sanitise($_POST['fname']) : null;
        $lname = isset($_POST['lname']) ? Form::sanitise($_POST['lname']) : null;
        $password = isset($_POST['password']) ? Form::sanitise($_POST['password']) : null;
        $email = isset($_POST['email']) ? Form::sanitise($_POST['email']) : null;
        $type = isset($_POST['type']) ? Form::sanitise($_POST['type']) : null;
        $bio = isset($_POST['bio']) ? Form::sanitise($_POST['bio']) : null;
        $picture = isset($_POST['picture']) ? Form::sanitise($_POST['picture']) : null;

        $fnameError = Validator::validateText('First Name', $fname, 30);
        if ($fnameError != null) {
            throw new Exception($fnameError);
        }$lnameError = Validator::validateText('Last Name', $lname, 30);
        if ($lnameError != null) {
            throw new Exception($lnameError);
        }$usernameError = Validator::validateText('Username', $username, 30);
        if ($usernameError != null) {
            throw new Exception($usernameError);
        }$passwordError = Validator::validateText('Password', $password, 30);
        if ($passwordError != null) {
            throw new Exception($passwordError);
        }$emailError = Validator::validateText('Email', $email, 30);
        if ($emailError != null) {
            throw new Exception($emailError);
        }$typeError = Validator::validateText('Type', $type, 30);
        if ($typeError != null) {
            throw new Exception($typeError);
        }$bioError = Validator::validateText('Bio', $bio, 30);
        if ($bioError != null) {
            throw new Exception($bioError);
        }

        $product = new Entity\User($username, $fname, $lname, $password, $email, $type, $bio, $picture);
//        $user->status = $status;
        $user->user_id = $user_id;
        $result = Controller\User::edit($user);

        if ($result !== true) {
            throw new \Exception("User creation failed");
        }
        $success = "User edited successfully";
//        header('location: view.php');
        echo $success;


    }
} catch (\Exception $e) {
    echo $e->getMessage();
}

