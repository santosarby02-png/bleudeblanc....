<?php
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    
    $_session = [];

    session_unset();

    session_destroy();

    header("location: bleuLogIn.php");
?>