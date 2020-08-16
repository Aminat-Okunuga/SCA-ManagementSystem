<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12-Aug-20
 * Time: 8:16 AM
 */
include_once '../../autoload.php';
include_once './process_edit.php';

use \Library\Form as Form;
use \Library\Validator as Validator;


try{
    $mentor_id = isset($_GET['mentor_id']) ? Form::sanitise($_GET['mentor_id']) :null;
    $mentorError = Validator::validateNumber('Mentor', $mentor_id);
if ($mentorError !=null){
    throw new \Exception($mentorError);
}

    $mentor = Controller\Mentor::get($mentor_id);
    if($mentor == null) {
        throw new \Exception("Mentor does not exist");
    }

}catch(\Exception $e){
    $error = $e->getMessage();
}
?>
<html>
<head>
    <title>Edit | Mentor</title>
</head>
<body>
<h3>Edit Mentor</h3>
<div class="container">
    <div>
        <form action="../mentor/edit.php?mentor_id=<?= $mentor_id?>" method="post">
<!--            --><?//=$mentor_id; exit();?>
            <div>
                <label for="cohort">Cohort:</label>
                <select name="cohort" id="">
                    <option value="">Select Cohort</option>
                    <option <?= $mentor['cohort_id'] == 1 ? 'selected' : '' ?> value="1"><?=$mentor['cohort_id']?></option>
                    <option <?= $mentor['cohort_id'] == 2 ? 'selected' : '' ?> value="2">Inactive</option>
                </select>
            </div>
            <div>
                <label for="track">Track:</label>
                <select name="track" id="">
                    <option value="">Select track</option>
                    <option <?= $mentor['track_id'] == 1 ? 'selected' : '' ?> value="1"><?=$mentor['track_id']?></option>
                    <option <?= $mentor['track_id'] == 2 ? 'selected' : '' ?> value="2">Inactive</option>
                </select>
            </div>
            <input type="hidden" name="mentor_id" id="mentor_id" value="<?= $mentor_id ?>">
            <div>
                <input type="submit" name="edit_mentor" value="Edit">
            </div>

        </form>
    </div>
</div>
</body>
</html>
