<?php
    if (isset($_GET['term']))
    {
        $term = $_GET['term'];
        require 'dbHelper.php';
        $dbo = new db();

        if ($term == '' || $term == ' ')
            $query = $dbo->getAllUsers();
        else
            $query = $dbo->getUserDetails($term);
    }
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search</title>
    </head>

    <body>
        <?php include 'header.php'; ?>
        <div class="container">
            <h3>Your search for <?php
            $plural = $query->rowCount() > 1 ? "results" : "result";
             echo "'$term' returned ". $query->rowCount() . ' ' . $plural ?></h3>
           <?php
            while ($row = $query->fetch(PDO::FETCH_ASSOC))
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
            <?php } ?>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>
