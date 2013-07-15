<?php
  session_start();

  if (isset($_POST['password']) && isset($_POST['email']) && isset($_POST['username']))
  {
    require 'database_connect.php';
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $email = mysql_real_escape_string($_POST['email']);

    $query_string = sprintf("INSERT INTO users (username, password, userType) VALUES ('%s', '%s', 'user')",
      $username, $password);
    $result = mysql_query( $query_string) or die(mysql_error());
    $query_string = sprintf("INSERT INTO userDetail (username, email) VALUES ('%s', '%s')",
      $username, $email);
    $result = mysql_query( $query_string) or die(mysql_error());
    $_SESSION['userType'] = 'user';
    $_SESSION['username'] = $username;
    header('Location: ./settings.php');

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

            .form-register {
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
            .form-register .form-register-heading,
            .form-register .checkbox {
              margin-bottom: 10px;
            }
            .form-register input[type="text"],
            .form-register input[type="password"] {
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
        <li class="">
          <a href="login.php">Login</a>
        </li>
        <li class="active" ><a href="register.php">Register</a></li>
      </ul>
      <form class="form-register" action="" method="post">
        <h2 class="form-register-heading">Register</h2>
        <input type="text" class="input-block-level" placeholder="Username" name="username">
        <input type="text" class="input-block-level" placeholder="Email" name="email">

        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <input type="password" class="input-block-level" placeholder="Confirm Password" name="confirmPassword">
        <center>
        <button class="btn btn-large btn-primary" type="submit" name="submit">Register</button>
        </center>
      </form>

    <?php include 'footer.php'; ?>
    </div> <!-- /container -->
 </body>
</html>
