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
    $query_string = sprintf("SELECT * FROM users WHERE username='%s'", $username);

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
    }
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

    <div class="container" style="position: relative; top: 40px;">
        <div class="row-fluid">
            <div class="span4 well">
                <img src="<?php echo"$profilePic" ?>">
            </div>
            <div class="span8">
                <div class="row-fluid">
                    <div class="span4">
                        <?php
                            echo "<h2>$fullName</h2>";
                            echo "<p class='lead'>Age: $age</p>";
                         ?>
                    </div>
                    <div class="span8">
                        <h2>About Me</h2>
                        <?php
                            echo "<p>$about</p>";
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
