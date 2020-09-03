<?php
include_once '../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;


try {
    $error = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!isset($_POST['login']) && $error == null) {
            throw new \Exception("Invalid request format,. please try again");
        }    
        $username = isset($_POST['username']) ? Form::sanitise($_POST['username']) : null;
        $password = isset($_POST['password']) ? Form::sanitise($_POST['password']) : null;
        $email = isset($_POST['email']) ? Form::sanitise($_POST['email']) : null;

//        var_dump($_POST);exit();

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
        

        $user = new Entity\User($username, $password, $email);
        $result = controller\User::login($user);

        if ($result !== true) {
            throw new \Exception("login failed");
        }
         if ($user->getStatus() == 1) {
            $_SESSION['user_id'] = $user->getId();
            if ($user->setUser($user->getUserType())) {

                if($user->getUserType() == "mentor"){
                    header("mentor_dashboard.php");
                }
                elseif($user->getUserType() == "mentee"){
                    header("mentee_dashboard.php");
                }
            }
        } else {
                header('location: login.php');
            }
        // header("Location: index.php");
        echo $message;
    }
}catch (\Exception $e) {
        echo $e->getMessage();
        exit();
}
    

