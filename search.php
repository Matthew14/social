<?php
    if (isset($_GET['term']))
    {
        require 'database_connect.php';
        $term = mysql_real_escape_string($_GET['term']);

        if ($term == '' || $term == ' ')
            $query_string = sprintf('SELECT * FROM users INNER JOIN userDetail on users.username =userDetail.username');
        else
        {
            $query_string = sprintf(
                "SELECT * FROM users INNER JOIN userDetail on users.username=userDetail.username WHERE users.username LIKE'%s'", $term);
        }
        $result = mysql_query( $query_string) or die(mysql_error());
        $row = mysql_fetch_assoc($result);
    }
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Settings</title>
    </head>

    <body>
        <?php include 'header.php'; ?>
        <div class="container">
            <?php
            $count = 0;
            while ($row)
            {?>
                <a href="./profile.php?user=<?php echo $row['username']?>">
                    <div class="row-fluid" style="margin-top: 20px;">
                        <div class="span5 well">
                            <img src="<?php echo $row['picture'] ?>" />
                        </div>
                        <div class="span7 well">
                            <h4><?php echo $row['firstName'] . ' ' . $row['surname']; ?></h4>
                            <p>Location: <?php echo $row['location']; ?></p>
                            <p>Gender: <?php echo $row['gender']; ?></p>
                            <p>About: <?php echo $row['about'] ?></p>
                        </div>
                    </div>
                </a>
                <?php
                $row = mysql_fetch_assoc($result);
                $count++;
            }

            echo $count > 1 ? "There were $count results for your search" : "There was $count result for your search";
            ?>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>
