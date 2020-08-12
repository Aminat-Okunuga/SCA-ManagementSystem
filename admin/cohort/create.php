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
    <title>Create | Cohort</title>
</head>
<body>
<h3>Create Cohort</h3>
<div class="container">
    <div>
        <form action="../cohort/create.php" method="post">
            <div>
            <label for="name">Name:</label>
            <input type="text" name="name">
            </div>
            <div>
                <input type="submit" name="create_cohort" value="Create">
            </div>

        </form>
    </div>
</div>
</body>
</html>
