<?php

include_once '../../autoload.php';

$users = array();
$error = false;

try {
    $users = Controller\User::getAll();
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
                <th>User Name</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type/th>
                <th>Bio</th>
                <th>Picture</th>
                <th>Status</th>
                <th>Date</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $id = 0;
            foreach($users as $user): ?>
                <tr>
                    <td><?= ++$id?></td>
                    <td><?= $user['username']?></td>
                    <td><?= $user['fname']. " ".  $user['lname']?></td>
                    <td><?= $user['email']?></td>
                    <td><?= $user['user_type']?></td>
                    <td><?= $user['bio']?></td>
                    <td><?= $user['picture']?></td>
                    <td><?= $user['status']?></td>
                    <td><?= $user['date_created']?></td>
                    <td><a href="edit.php?user_id=<?= $user['id']?>"><button>Edit</button></a></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>