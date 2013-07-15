<?php
session_start();
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
?>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<div class="navbar navbar-static-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-circle-arrow-down"></span>
            </a>
            <a href="index.php" class="brand">Matthew's Social Network</a>
            <form class="navbar-search" action="search.php" method="get">
              <input type="text" class="search-query" placeholder="Search" name="term">
            </form>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <?php
                        if(curPageName() == 'index.php'){
                        echo'<li class="active"><a href="index.php">Home</a></li>
                        <li class=""><a href="contact.php">Contact Me</a></li>';
                        }
                        elseif (curPageName() == 'contact.php') {
                        echo'<li class=""><a href="index.php">Home</a></li>
                        <li class="active"><a href="contact.php">Contact Me</a></li>';
                        }
                        else{
                        echo'<li class=""><a href="index.php">Home</a></li>
                        <li class=""><a href="contact.php">Contact Us</a></li>';
                        }
                        if (isset($_SESSION['userType'])) {
                           if ($_SESSION['userType'] == 'admin') {
                                $cssClass= '';
                                if(curPageName() == 'admin.php'){
                                    $cssClass = "active";
                                }
                               echo "<li class='$cssClass'><a href=\"admin.php\">Admin Panel</a></li>";
                           }
                       }
                           if ($_SESSION['userType'] == 'user' || $_SESSION['userType'] == 'admin')
                           {
                                $strToPrint = "<li>
                                        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"profile.php?user=" . $_SESSION['username'] . "\">
                                            <i class=\"icon-thumbs-up\"></i> " .  $_SESSION['username'] . "
                                            <span class=\"caret\"></span>
                                        </a>
                                        <ul class=\"dropdown-menu\">
                                            <li><a href=\"profile.php?user=" . $_SESSION['username'] . "\">Profile</a></li>
                                            <li><a href=\"settings.php\">Settings</a></li>
                                            <li class=\"divider\"></li>
                                            <li><a href=\"logout.php\">Logout</a></li>
                                        </ul>
                                </li>";
                                echo "$strToPrint";
                            }
                            else
                            {
                                echo"<li><a href=\"login.php\">Login / Register</a></li>";
                            }
                        ?>
                </ul>
            </div> <!-- Nav Collapse -->
        </div> <!-- End Container -->
    </div> <!-- End Navbar inner -->
</div> <!-- End navbar -->
