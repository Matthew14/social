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
        <title>Home</title>
    </head>
    <body>
    <?php include 'header.php'; ?>
        <div class="hero-unit">
          <h1>Welcome!</h1>
          <p>The open source social network</p>
          <p>
            <a href="login.php" class="btn btn-primary btn-large">
              Login
            </a>
            <a href="register.php"class="btn btn-primary btn-large">
              Register
            </a>
          </p>
        </div>
    <?php include 'footer.php';?>
    </body>
</html>
