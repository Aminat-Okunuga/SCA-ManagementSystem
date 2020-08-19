<?php
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
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date">
            </div>
            <div>
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date">
            </div>
            <div>
                <input type="submit" name="create_cohort" value="Create">
            </div>

        </form>
    </div>
</div>
</body>
</html>
