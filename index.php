<?php
$now = new DateTime('now');
$birth = new DateTime('91-11-14');
$interval = $now->diff($birth);
$age = $interval->format('%Y');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Matthew O'Neill</title>
    </head>
    <body>
    <?php include 'header.php'; ?>


    <?php include 'footer.php';?>
    </body>
</html>
