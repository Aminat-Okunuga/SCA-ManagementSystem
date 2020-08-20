<?php
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
                <select name="level" id="level">
                    <option value="">Select Level</option>
                    <option value="beginner">Beginner</option>
                    <option value="junior">Junior</option>
                    <option value="intermediate">Intermediate</option>
                </select>
            </div>
            <div>
                <input type="submit" name="create_track" value="Create">
            </div>

        </form>
    </div>
</div>
</body>
</html>
