<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 17-Aug-20
 * Time: 5:38 PM
 */
include_once '../../autoload.php';
include_once './process.php';

use \Library\Form as Form;
use \Library\Validator as Validator;

$user = array();
$error = false;

try {
    $user_id = isset($_GET['user_id']) ? Form::sanitise($_GET['user_id']) : null;
    $userError = Validator::validateNumber('User', $user_id);
    if ($userError != null) {
        throw new \Exception($userError);
    }

    $user = Controller\User::get($user_id);
    if ($user == null) {
        throw new \Exception("User does not exist");
    }

} catch (\Exception $e) {
    $error = $e->getMessage();
}

?>
<html>
<head>
    <title></title>
</head>
<body>
<h3>Edit User</h3>
<div class="container">
    <div>
        <form action="../user/process_edit.php" method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" value="<?= $user['username'] ?>">
            </div>
            <div>
                <label for="first_name">First Name:</label>
                <input type="text" name="fname" value=" <?= $user['fname'] ?>">
            </div>
            <div>
                <label for="second_name">Second Name:</label>
                <input type="text" name="lname" value="<?= $user['lname'] ?>">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" value="<?= $user['password'] ?>">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?= $user['email'] ?>">
            </div>
            <div>
                <label for="type">Type:</label>
                <select name="type" id="">
                    <option value="">Select Type</option>
                    <option value="<?= $user['user_type'] ?>"><?= $user['user_type'] ?></option>
                    <option value="<?= $user['user_type'] ?>"><?= $user['user_type'] ?></option>
                </select>
            </div>

            <div>
                <label for="bio">Bio</label>
                <textarea name="bio" id="bio" cols="30" rows="10"><?= $user['bio'] ?></textarea>
            </div>
            <div>
                <input type="file" name="picture">
            </div>
            <input type="hidden" name="user_id" id="user_id" value="<?= $user_id ?>">
            <div>
                <input type="submit" name="edit_user" value="Create">
            </div>

        </form>
    </div>
</div>
</body>
</html>
