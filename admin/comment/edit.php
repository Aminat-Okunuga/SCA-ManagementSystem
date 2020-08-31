<?php
include_once '../../autoload.php';
include_once './process_edit.php';

use \Library\Form as Form;
use \Library\Validator as Validator;
$comment = array();
$error = false;
try{
$comment_id = isset($_GET['comment_id']) ? Form::sanitise($_GET['comment_id']) :null;
$commentError = Validator::validateNumber('Comment', $comment_id);
if ($commentError !=null){
    throw new \Exception($commentError);
}

    $comment = Controller\Comment::get($comment_id);
    if($comment == null) {
        throw new \Exception("Comment does not exist");
    }

}catch(\Exception $e){
    $error = $e->getMessage();
}
?>
<html>
<head>
    <title>Edit | Comment</title>
</head>
<body>
<h3>Edit Comment</h3>
<div class="container">
    <div>
        <form action="../comment/edit.php?comment_id=<?= $comment_id?>" method="post">
            <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?= $comment['description'];?>">
            </div>
            <div>
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="">Select a status</option>
                    <option <?= $comment['status'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                    <option <?= $comment['status'] == 2 ? 'selected' : '' ?> value="2">Inactive</option>
                </select>
            </div>
            <input type="hidden" name="comment_id" id="comment_id" value="<?= $comment_id ?>">
            <div>
                <input type="submit" name="edit_comment" value="Edit">
            </div>

        </form>
    </div>
</div>
</body>
</html>
