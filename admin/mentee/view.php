<?php

include_once '../../autoload.php';

$mentees = array();
$error = false;

try {
    $mentees = Controller\Mentee::getAll();
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
            foreach($mentees as $mentee): ?>

                <tr>
                    <td><?= ++$id;?></td>
<!--                    <td>--><?//= $mentor['name']?><!--</td>-->
                    <td>My Name</td>
                    <td><?= $mentee['cohort_id']?></td>
                    <td><?= $mentee['track_id']?></td>
                    <td><?= $mentee['status']?></td>
                    <td><?= $mentee['date_created']?></td>
                    <td><a href="edit.php?mentee_id=<?= $mentee['id']?>"><button>Edit</button></a></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>