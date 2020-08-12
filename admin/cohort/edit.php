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
$cohort = array();
$error = false;
try{
$cohort_id = isset($_GET['cohort_id']) ? Form::sanitise($_GET['cohort_id']) :null;
$cohortError = Validator::validateNumber('Cohort', $cohort_id);
if ($cohortError !=null){
    throw new \Exception($cohortError);
}

    $cohort = Controller\Cohort::get($cohort_id);
    if($cohort == null) {
        throw new \Exception("Cohort does not exist");
    }

}catch(\Exception $e){
    $error = $e->getMessage();
}
?>
<html>
<head>
    <title>Edit | Cohort</title>
</head>
<body>
<h3>Edit Cohort</h3>
<div class="container">
    <div>
        <form action="../cohort/edit.php?cohort_id=<?= $cohort_id?>" method="post">
            <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?= $cohort['name'];?>">
            </div>
            <div>
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="">Select a status</option>
                    <option <?= $cohort['status'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                    <option <?= $cohort['status'] == 2 ? 'selected' : '' ?> value="2">Inactive</option>
                </select>
            </div>
            <input type="hidden" name="cohort_id" id="cohort_id" value="<?= $cohort_id ?>">
            <div>
                <input type="submit" name="edit_cohort" value="Edit">
            </div>

        </form>
    </div>
</div>
</body>
</html>
