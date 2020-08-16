<?php

include_once '../../autoload.php';

$comments = array();
$error = false;

try {
    $comments = Controller\Comment::getAll();
} catch (\Exception $e) {
    $error = $e->getMessage();
    exit($error);
}

?>

<!DOCTYPE html>
<html lang="en">
<body>
<div>

    <div>
        <table border="1">
            <thead>
            <tr>
                <th>ID</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Date</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $id = 0;
            foreach($comments as $comment): ?>
                <tr>
                    <td><?= ++$id; ?></td>
                    <td><?= $comment['description']?></td>
                    <td><?= $comment['status']?></td>
                    <td><?= $comment['date_created']?></td>
                    <td><a href="edit.php?comment_id=<?= $comment['id']?>"><button>Edit</button></a></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>