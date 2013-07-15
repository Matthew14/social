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

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo "$fullName"; ?></title>
    </head>
    <body>

    <?php include 'header.php'; ?>

    <div class="container" style="position: relative; top: 40px;">
        <ul class="nav nav-tabs">
        <li class="active">
          <a href="profile.php?user=<?php echo $user; ?>">Profile</a>
        </li>
        <li><a href="photos.php?user=<?php echo $user; ?>">Photos</a></li>
        <li><a href="friends.php">Friends</a></li>
      </ul>
        <?php echo "<h1 style=\"font-size: 60px;\">$fullName</h1>"; ?>
        <div class="row-fluid" style="margin-top: 20px;">
            <div class="span4 well">
                <a href="photos.php"><img src="<?php echo"$profilePic" ?>"></a>
            </div>
            <div class="span8">
                <div class="row-fluid">
                    <div class="span4">
                        <?php
                            echo "<p>Age: $age</p>";
                            echo "<p>Gender: $gender</p>";
                            echo "<p>Location: $location</p>";
                         ?>
                    </div>
                    <div class="span8">
                        <h2>About Me</h2>
                        <?php
                            echo "<p>$about</p>";
                            // Show edit button if the user is on own profile
                            if($user == $_SESSION['username'])
                                echo "<a class=\"btn\" href=\"./settings.php#about\">Edit</a>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    </body>
</html>
