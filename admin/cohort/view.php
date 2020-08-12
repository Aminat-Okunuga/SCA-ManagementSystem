<?php

include_once '../../autoload.php';

$cohorts = array();
$error = false;

try {
    $cohorts = Controller\Cohort::getAll();
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
                <th>Status</th>
                <th>Date</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($cohorts as $cohort): ?>
                <tr>
                    <td><?= $cohort['id']?></td>
                    <td><?= $cohort['name']?></td>
                    <td><?= $cohort['status']?></td>
                    <td><?= $cohort['date_created']?></td>
                    <td><a href="edit.php?cohort_id=<?= $cohort['id']?>"><button>Edit</button></a></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>