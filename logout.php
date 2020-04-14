<?php
    // Start the session
    session_start();

    header("Location: login.php");

    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    header("Location: login.php");
?>

