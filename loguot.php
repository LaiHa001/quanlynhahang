<?php 
    session_start();
    session_destroy();
    // unset($_SESSION['member']);
    header('location: login.php');
?>