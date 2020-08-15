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

        if (!isset($_POST['create_user']) && $error == null) {
            throw new \Exception("Invalid request format,. please try again");
        }

        $username = isset($_POST['username']) ? Form::sanitise($_POST['username']) : null;
        $fname = isset($_POST['fname']) ? Form::sanitise($_POST['fname']) : null;
        $lname = isset($_POST['lname']) ? Form::sanitise($_POST['lname']) : null;
        $password = isset($_POST['password']) ? Form::sanitise($_POST['password']) : null;
        $email = isset($_POST['email']) ? Form::sanitise($_POST['email']) : null;
        $type = isset($_POST['type']) ? Form::sanitise($_POST['type']) : null;
        $bio = isset($_POST['bio']) ? Form::sanitise($_POST['bio']) : null;
        $picture = isset($_POST['picture']) ? Form::sanitise($_POST['picture']) : null;

//        var_dump($_POST);exit();

        $fnameError = Validator::validateText('First Name', $fname, 30);
        if ($fnameError != null) {
            throw new Exception($fnameError);
        }
        $lnameError = Validator::validateText('Last Name', $lname, 30);
        if ($lnameError != null) {
            throw new Exception($lnameError);
        }
        $usernameError = Validator::validateText('Username', $username, 30);
        if ($usernameError != null) {
            throw new Exception($usernameError);
        }
        $passwordError = Validator::validateText('Password', $password, 30);
        if ($passwordError != null) {
            throw new Exception($passwordError);
        }
        $emailError = Validator::validateText('Email', $email, 30);
        if ($emailError != null) {
            throw new Exception($emailError);
        }
        $typeError = Validator::validateText('Type', $type, 30);
        if ($typeError != null) {
            throw new Exception($typeError);
        }
        $bioError = Validator::validateText('Bio', $bio, 30);
        if ($bioError != null) {
            throw new Exception($bioError);
        }

        $user = new Entity\User($username, $fname, $lname, $password, $email, $type, $bio, $picture);
        $result = controller\User::create($user);

        if ($result !== true) {
            throw new \Exception("User creation failed");
        }
        $message = "User created successfully";
        echo $message;

    }
} catch (\Exception $e) {
    echo $e->getMessage();
    exit();
}

