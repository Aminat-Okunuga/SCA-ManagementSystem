<?php

include_once '../../autoload.php';

$mentors = array();
$error = false;

try {
    $mentors = Controller\Mentor::getAll();
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
                <th>Name</th>
                <th>Cohort</th>
                <th>Track</th>
                <th>Status</th>
                <th>Date</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $id = 0;
            foreach($mentors as $mentor): ?>

                <tr>
                    <td><?= ++$id;?></td>
<!--                    <td>--><?//= $mentor['name']?><!--</td>-->
                    <td>My Name</td>
                    <td><?= $mentor['cohort_id']?></td>
                    <td><?= $mentor['track_id']?></td>
                    <td><?= $mentor['status']?></td>
                    <td><?= $mentor['date_created']?></td>
                    <td><a href="edit.php?mentor_id=<?= $mentor['id']?>"><button>Edit</button></a></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>