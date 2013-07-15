<?php
   session_start();
   require 'database_connect.php';

   if (isset($_POST['submit']))
   {
       $username = mysql_real_escape_string($_POST['username']);
       $password = mysql_real_escape_string($_POST['password']);

       $query_string = sprintf("SELECT * FROM users WHERE username='%s'", $username);

       $result = mysql_query( $query_string) or die(mysql_error());
       $row = mysql_fetch_assoc($result);
       if ($row['password'] == $password)
       {
          $_SESSION['userType'] = $row['usertype'];
          $_SESSION['username'] = $row['username'];

          if ($_SESSION['userType'] == 'admin')
          {
             header('Location: ./admin.php');
          }
          else
             header('Location: ./index.php');
       }
       else
           header('Location: ./login.php?error=Incorrect+Login+Details');
   }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign in</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <style type="text/css">
            body {
              padding-top: 10px;
              padding-bottom: 40px;
              background-color: #f5f5f5;
            }

            .form-signin {
              max-width: 300px;
              padding: 19px 29px 29px;
              margin: 0 auto 20px;
              background-color: #fff;
              border: 1px solid #e5e5e5;
              -webkit-border-radius: 5px;
                 -moz-border-radius: 5px;
                      border-radius: 5px;
              -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                 -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                      box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
              margin-bottom: 10px;
            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
              font-size: 16px;
              height: auto;
              margin-bottom: 15px;
              padding: 7px 9px;
            }
    </style>
    </head>
    <body>
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.js"></script>
      <div class="container">
      <?php
         if (isset($_GET['error']))
            echo "<div class=\"alert alert-error\" id=\"formError\">
                   <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                   <strong>ERROR! </strong>" . $_GET['error'] . "
                 </div>";
       ?>
       <ul class="nav nav-tabs">
        <li class="active">
          <a href="login.php">Login</a>
        </li>
        <li><a href="register.php">Register</a></li>
      </ul>
      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Sign In</h2>
        <input type="text" class="input-block-level" placeholder="Username" name="username">
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <center>
        <button class="btn btn-large btn-primary" type="submit"name="submit">Sign in</button>
        </center>
      </form>

    <?php include 'footer.php'; ?>
    </div> <!-- /container -->
 </body>
</html>
