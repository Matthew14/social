<?php
    //Fill in the blanks:
    $databaseEngine = "mysql";

    $databaseHost = "";
    $databaseUsername = "";
    $databasePassword = "";
    $databaseName = "";

    //for testing on a local development server:
    if ($_SERVER['SERVER_NAME'] == 'localhost')
    {
        $databaseHost = "";
        $databaseUsername = "";
        $databasePassword = "";
        $databaseName = "";
    }
?>
