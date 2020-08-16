<?php

include_once '../../autoload.php';

$tracks = array();
$error = false;

try {
    $tracks = Controller\Track::getAll();
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
            <?php
            $id = 0;
            foreach($tracks as $track): ?>
                <tr>
                    <td><?= ++$id; ?></td>
                    <td><?= $track['name']?></td>
                    <td><?= $track['status']?></td>
                    <td><?= $track['date_created']?></td>
                    <td><a href="edit.php?cohort_id=<?= $track['id']?>"><button>Edit</button></a></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>