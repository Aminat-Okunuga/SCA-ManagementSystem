<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12-Aug-20
 * Time: 8:16 AM
 */
include_once '../../autoload.php';
include_once './process.php';
$cohorts = $tracks = $mentors = array();
$error = false;

try {
    $cohorts = Controller\Cohort::getAll();
    $tracks = Controller\Track::getAll();
    $mentors = Controller\Mentor::getAll();
} catch (\Exception $e) {
    $error = $e->getMessage();
}

?>
<html>
<head>
    <title>Create | Mentee</title>
</head>
<body>
<h3>Create Mentee</h3>
<div class="container">
    <div>
        <form action="../mentee/create.php" method="post">

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
                    <option value="">Select Track</option>
                    <?php foreach ($tracks as $track): ?>
                        <option value="<?php echo $track['id']; ?>">
                            <?php echo $track['name']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label for="track">Mentor:</label>
                <select name="mentor" id="">
                    <option value="">Select Mentor</option>
                    <?php foreach ($mentors as $mentor): ?>
                        <option value="<?php echo $mentor['id']; ?>">
                            <?php echo $mentor['id']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <input type="submit" name="create_mentee" value="Create">
            </div>

        </form>
    </div>
</div>
</body>
</html>
