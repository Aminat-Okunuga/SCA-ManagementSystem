<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12-Aug-20
 * Time: 8:16 AM
 */
include_once '../../autoload.php';
include_once './process.php';
$cohorts = $tracks = array();
$error = false;

try {
    $cohorts = Controller\Cohort::getAll();
    $tracks = Controller\Track::getAll();
} catch (\Exception $e) {
    $error = $e->getMessage();
}

?>
<html>
<head>
    <title>Create | Mentor</title>
</head>
<body>
<h3>Create Mentor</h3>
<div class="container">
    <div>
        <form action="../mentor/create.php" method="post">

            <div>
                <label for="cohort">Cohort:</label>
                <select name="cohort" id="">
                    <option value="">Select Cohort</option>
                    <?php foreach ($cohorts as $cohort): ?>
                        <option value="<?php echo $cohort['id']; ?>">
                            <?php echo $cohort['name']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label for="track">Track:</label>
                <select name="track" id="">
                    <option value="">Select track</option>
                    <?php foreach ($tracks as $track): ?>
                        <option value="<?php echo $track['id']; ?>">
                            <?php echo $track['name']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <input type="submit" name="create_mentor" value="Create">
            </div>

        </form>
    </div>
</div>
</body>
</html>
