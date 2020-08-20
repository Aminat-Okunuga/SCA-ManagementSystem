<?php
include_once '../../autoload.php';
include_once './process_edit.php';

use \Library\Form as Form;
use \Library\Validator as Validator;


try{
    $track_id = isset($_GET['track_id']) ? Form::sanitise($_GET['track_id']) :null;
    $trackError = Validator::validateNumber('Track', $track_id);
if ($trackError !=null){
    throw new \Exception($trackError);
}

    $track = Controller\Track::get($track_id);
    if($track == null) {
        throw new \Exception("Track does not exist");
    }

}catch(\Exception $e){
    $error = $e->getMessage();
}
?>
<html>
<head>
    <title>Edit | Track</title>
</head>
<body>
<h3>Edit Track</h3>
<div class="container">
    <div>
        <form action="../track/edit.php?track_id=<?= $track_id?>" method="post">
<!--            --><?//=$track_id; exit();?>
            <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?=$track['name'];?>">
            </div>
            <div>
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="">Select a status</option>
                    <option <?= $track['status'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                    <option <?= $track['status'] == 2 ? 'selected' : '' ?> value="2">Inactive</option>
                </select>
            </div>
            <div>
                <label for="level">Level</label>
                <select name="level" id="level">
                    <option value="">Select a level</option>
                    <option value="beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                </select>
            </div>
            <input type="hidden" name="track_id" id="track_id" value="<?= $track_id ?>">
            <div>
                <input type="submit" name="edit_track" value="Edit">
            </div>

        </form>
    </div>
</div>
</body>
</html>
