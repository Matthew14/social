<?php
    session_start();
    $_SESSION['userType'] = null;
    $_SESSION['username'] = null;
    if (isset($_GET['return']))
        $page = $_GET['return'];
    else
        $page = 'index.php';
    header('Location: ./' . $page);
?>
