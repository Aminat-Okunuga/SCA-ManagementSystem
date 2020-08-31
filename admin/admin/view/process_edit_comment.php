<?php
include_once '../../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;


try {
    $error = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!isset($_POST['edit_comment']) && $error == null) {
            throw new \Exception("Invalid request format,. please try again");
        }

        $description = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;
       $comment_id = isset($_POST['comment_id']) ? Form::sanitise($_POST['comment_id']) : null;
        $status = isset($_POST['status']) ? Form::sanitise($_POST['status']) : null;

        $descriptionError = Validator::validateText('Name', $description, 30);
        if ($descriptionError != null) {
            throw new Exception($descriptionError);
        }

        $comment = new Entity\Comment($description);
        $comment->status = $status;
         $comment->comment_id = $comment_id;
        $result = controller\Comment::edit($comment);

        if ($result !== true) {
            throw new \Exception("Comment creation failed");
        }
        $success = "Comment edited successfully";
//        header('location: view.php');
        echo $success;

    }
} catch (\Exception $e) {
    echo $e->getMessage();
}

