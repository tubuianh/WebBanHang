<?php 
    session_start();
    unset($_SESSION['users']);
    header("Location: login.php");
?>