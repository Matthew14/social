<?php
    $host = "";
    $dbUsername = "";
    $password = "";
    $database_name = "";

    $connection = mysql_connect($host, $dbUsername, $password, $database_name) or die(mysql_error());
    mysql_select_db($database_name, $connection) or die(mysql_error());
?>
