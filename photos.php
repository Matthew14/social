<?php
    session_start();
    require 'database_connect.php';
    if (! isset($_GET['user']))
    {
        if (! isset($_SESSION['username']))
        {
            header('Location: ./login.php');
        }
        else
            $user = $_SESSION['username'];
    }
    else
    {
        $user = $_GET['user'];
    }

    $username = mysql_real_escape_string($user);
    $query_string = sprintf("SELECT * FROM userDetail WHERE username='%s'", $username);

    $result = mysql_query($query_string) or die(mysql_error());
    $row = mysql_fetch_assoc($result);
    if ($row)
    {
        $fullName = $row['firstName'] . ' ' . $row['surname'];

        $now = new DateTime('now');
        $birth = new DateTime($row['dob']);
        $interval = $now->diff($birth);
        $age = $interval->format('%Y');

        $about = $row['about'];
        $profilePic = $row['picture'];
        $location = $row['location'];
        $gender = $row['gender'];
    }
    $query_string = sprintf("SELECT * FROM photos WHERE owner='%s'", $username);

    $result = mysql_query($query_string) or die(mysql_error());
    $rowOfImages = mysql_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo "$fullName"; ?>'s Photos</title>
    </head>
    <body>

    <?php include 'header.php'; ?>

    <div class="container" style="position: relative; top: 40px;">
        <ul class="nav nav-tabs">
        <li class="">
          <a href="profile.php?user=<?php echo $user; ?>">Profile</a>
        </li>
        <li class="active"><a href="photos.php?user=<?php echo $user; ?>">Photos</a></li>
        <li><a href="friends.php">Friends</a></li>
      </ul>
        <?php
            if ($user == $_SESSION['username'])
                echo "<h1 style=\"font-size: 60px;\">$fullName's Photos <a href=\"uploadPhoto.php\" class=\"btn btn-large btn-primary\">Upload  Photo</a></h1>";
            else
                echo "<h1 style=\"font-size: 60px;\">$fullName's Photos</h1>";
         ?>
            <?php

            while ($rowOfImages)
            {?>
                <div class="row-fluid" style="margin-top: 20px;">
                    <div class="span4 well">
                        <?php
                            echo "<a href=\"" . $rowOfImages['url'] ."\"><img src=\"". $rowOfImages['url'] ."\"</a>";
                        ?>
                    </div>
                    <div class="span4 well">
                        <?php
                            if ($rowOfImages = mysql_fetch_assoc($result))
                                echo "<a href=\"" . $rowOfImages['url'] ."\"><img src=\"". $rowOfImages['url'] ."\"</a>";
                        ?>
                    </div>
                    <div class="span4 well">
                        <?php
                            if ($rowOfImages = mysql_fetch_assoc($result))
                                echo "<a href=\"" . $rowOfImages['url'] ."\"><img src=\"". $rowOfImages['url'] ."\"</a>";
                        ?>
                    </div>
                </div>
                <?php $rowOfImages = mysql_fetch_assoc($result);
            }?>

    <?php include 'footer.php'; ?>
    </body>
</html>
