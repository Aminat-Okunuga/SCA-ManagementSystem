<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12-Aug-20
 * Time: 8:16 AM
 */
include_once '../../autoload.php';
include_once './process.php';
?>
<html>
<head>
    <title>Create | Track</title>
</head>
<body>
<h3>Create Track</h3>
<div class="container">
    <div>
        <form action="../track/create.php" method="post">
            <div>
            <label for="name">Name:</label>
            <input type="text" name="name">
            </div>
            <div>
            <label for="name">Level:</label>
            <input type="text" name="level">
            </div>
            <div>
                <input type="submit" name="create_track" value="Create">
            </div>

        </form>
    </div>
</div>
</body>
</html>
