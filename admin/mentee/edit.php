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
    $mentee_id = isset($_GET['mentee_id']) ? Form::sanitise($_GET['mentee_id']) :null;
    $menteeError = Validator::validateNumber('Mentee', $mentee_id);
if ($menteeError !=null){
    throw new \Exception($menteeError);
}

    $mentee = Controller\Mentee::get($mentee_id);
    if($mentee == null) {
        throw new \Exception("Mentee does not exist");
    }

}catch(\Exception $e){
    $error = $e->getMessage();
}
?>
<html>
<head>
    <title>Edit | Mentee</title>
</head>
<body>
<h3>Edit Mentee</h3>
<div class="container">
    <div>
        <form action="../mentee/edit.php?mentee_id=<?= $mentee_id?>" method="post">
<!--            --><?//=$mentor_id; exit();?>
            <div>
                <label for="mentor">Mentor:</label>
                <select name="mentor" id="">
                    <option value="">Select Mentor</option>
                    <option <?= $mentee['mentor_id'] == 1 ? 'selected' : '' ?> value="1"><?=$mentee['mentor_id']?></option>
                    <option <?= $mentee['mentor_id'] == 2 ? 'selected' : '' ?> value="2">Inactive</option>
                </select>
            </div>
            <div>
                <label for="cohort">Cohort:</label>
                <select name="cohort" id="">
                    <option value="">Select Cohort</option>
                    <option <?= $mentee['cohort_id'] == 1 ? 'selected' : '' ?> value="1"><?=$mentee['cohort_id']?></option>
                    <option <?= $mentee['cohort_id'] == 2 ? 'selected' : '' ?> value="2">Inactive</option>
                </select>
            </div>
            <div>
                <label for="track">Track:</label>
                <select name="track" id="">
                    <option value="">Select track</option>
                    <option <?= $mentee['track_id'] == 1 ? 'selected' : '' ?> value="1"><?=$mentee['track_id']?></option>
                    <option <?= $mentee['track_id'] == 2 ? 'selected' : '' ?> value="2">Inactive</option>
                </select>
            </div>
            <input type="hidden" name="mentee_id" id="mentee_id" value="<?= $mentee_id ?>">
            <div>
                <input type="submit" name="edit_mentee" value="Edit">
            </div>

        </form>
    </div>
</div>
</body>
</html>
