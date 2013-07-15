<?php
    session_start();
    if (isset($_SESSION['username']))
        $username = $_SESSION['username'];
    else
        header('Location: ./login.php');

    require 'database_connect.php';

    $successMessage = '';

    if (isset($_POST['about']) && $_POST['about'] != '')
    {
        $about = mysql_real_escape_string($_POST['about']);

        $query_string = sprintf("UPDATE userDetail SET about='%s' WHERE username='%s'"
            , $about, $username);
        $result = mysql_query( $query_string) or die(mysql_error());
        $successMessage = $successMessage . 'Updated About Me ' ;
    }
    if (isset($_POST['firstName']) && $_POST['firstName'] != '')
    {
        $firstName = mysql_real_escape_string($_POST['firstName']);
        $query_string = sprintf("UPDATE userDetail SET firstName='%s' WHERE username='%s'"
            , $firstName, $username);
        $result = mysql_query( $query_string) or die(mysql_error());
        $successMessage = $successMessage . '- Updated First Name ';
    }
    if (isset($_POST['surname']) && $_POST['surname'] != '')
    {
        $surname = mysql_real_escape_string($_POST['surname']);
        $query_string = sprintf("UPDATE userDetail SET surname='%s' WHERE username='%s'"
            , $surname, $username);
        $result = mysql_query( $query_string) or die(mysql_error());
        $successMessage = $successMessage . '- Updated Surname ';
    }
    if (isset($_POST['gender']) && $_POST['gender'] != '')
    {
        $gender = mysql_real_escape_string($_POST['gender']);
        $query_string = sprintf("UPDATE userDetail SET gender='%s' WHERE username='%s'"
            , $gender, $username);
        $result = mysql_query( $query_string) or die(mysql_error());
        $successMessage = $successMessage . '- Updated Gender ';
    }
    if (isset($_POST['location']) && $_POST['location'] != '')
    {
        $location = mysql_real_escape_string($_POST['location']);
        $query_string = sprintf("UPDATE userDetail SET location='%s' WHERE username='%s'"
            , $location, $username);
        $result = mysql_query( $query_string) or die(mysql_error());
        $successMessage = $successMessage . '- Updated Location ';
    }
    if (isset($_POST['dob'])) {
        $dob = $_POST['dob'];
        if ($dob != '')
        {
        $query_string = sprintf("UPDATE userDetail SET dob='%s' WHERE username='%s'"
            , $dob, $username);
        $result = mysql_query( $query_string) or die(mysql_error());
        $successMessage = $successMessage . '- Updated Date of Birth ';
    }
    }
    if (isset($_POST['password']) && isset($_POST['confirmPassword']))
    {
        $password = mysql_real_escape_string($_POST['password']);
        $confirmPassword = mysql_real_escape_string($_POST['confirmPassword']);
        if ($password != $confirmPassword)
            $errorMessage = "Passwords must match. ";
        else
        {
            $query_string = sprintf("UPDATE users SET password='%s' WHERE username='%s'"
            , $password, $username);
            $result = mysql_query( $query_string) or die(mysql_error());
            $successMessage = $successMessage . '- Updated Password ';
        }

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
        <?php
         if (isset($errorMessage))
            echo "<div class=\"alert alert-error\" id=\"formError\">
                   <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                   <strong>ERROR! </strong> $errorMessage
                 </div>";
         if (isset($successMessage) && $successMessage != '')
            echo "<div class=\"alert alert-success\" id=\"formSuccess\">
                   <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                   <strong>Success! </strong> $successMessage
                 </div>";
       ?>
        <div class="container">
            <div class="row-fluid" style="margin-top: 20px;">
                <div class="span4 well">
                    <h2>About Me</h2>
                    <form method="post" action="">
                        <div class="control-group">
                            <label class="control-label" for="textAreaAbout">About</label>
                            <div class="controls">
                              <textarea maxlength="15000" rows="12" class="input-xlarge" id="textAreaAbout" name="about" placeholder="About Me"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <center><br/><button type="submit" class="btn btn-primary btn-large">Save</button></center>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="span4 well">
                    <h2>Details</h2>
                    <h4>Not all fields required</h4>
                    <form method="post" action="">
                        <div class="control-group">
                            <label class="control-label" for="inputFirstName">First Name</label>
                            <div class="controls">
                              <input id="inputFirstName" type="text" class="input-xlarge" name="firstName" placeholder="First Name"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputSurname">Surname</label>
                            <div class="controls">
                              <input id="inputSurname" type="text" class="input-xlarge" name="surname" placeholder="Surname"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputGender">Gender</label>
                            <div class="controls">
                              <input id="inputGender" type="text" class="input-xlarge" name="gender" placeholder="Gender"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputLocation">Location</label>
                            <div class="controls">
                              <input id="inputLocation" type="text" class="input-xlarge" name="location" placeholder="Location"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputDOB">Date of Birth</label>
                            <div class="controls">
                              <input id="inputDOB" type="date" class="input-xlarge" name="dob" placeholder="Date of Birth"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <center><br/><button type="submit" class="btn btn-primary btn-large">Save</button></center>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="span4 well">
                    <h2>Login Details</h2>
                    <h4>Not all fields required</h4>
                    <form method="post" action="">
                        <div class="control-group">
                            <label class="control-label" for="inputusername">New Username</label>
                            <div class="controls">
                              <input id="inputusername"class="input-xlarge" type="text" name="username" placeholder="New Username"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">New Password</label>
                            <div class="controls">
                              <input id="inputPassword" type="password" class="input-xlarge" name="password" placeholder="New Password"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputConfirmPassword">Confirm Password</label>
                            <div class="controls">
                              <input id="inputConfirmPassword"class="input-xlarge" type="password" name="confirmPassword" placeholder="Confirm Password"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <center><br/><button type="submit" class="btn btn-primary btn-large">Save</button></center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>
