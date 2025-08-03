<?php 
    session_start(); // Starting The Session
    session_destroy(); // Destroy Session
    header("Location: userlogin.php");
    die;
?>
