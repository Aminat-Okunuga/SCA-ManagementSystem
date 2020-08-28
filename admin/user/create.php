<?php
include_once '../../autoload.php';
include_once './process.php';
?>
<html>
<head>
    <title>Create | User</title>
</head>
<body>
<h3>Create User</h3>
<div class="container">
    <div>
        <form action="../user/create.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username">
            </div>
            <div>
                <label for="first_name">First Name:</label>
                <input type="text" name="fname">
            </div>
            <div>
                <label for="second_name">Second Name:</label>
                <input type="text" name="lname">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="type">Type:</label>
                <select name="type" id="">
                    <option value="">Select Type</option>
                    <option value="<?= $user['user_type']?>">Mentor</option>
                    <option value="mentee">Mentee</option>
                </select>
            </div>

            <div>
                <label for="bio">Bio</label>
                <textarea name="bio" id="bio" cols="30" rows="10"></textarea>
            </div>
            <div>
                <input type="file" name="picture">
            </div>
            <div>
                <input type="submit" name="create_user" value="Create">
            </div>

        </form>
    </div>
</div>
</body>
</html>
