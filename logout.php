<?php
    session_start();
    if (isset($_SESSION['user']) && isset($_SESSION['success'])){
    session_destroy();
    header("Location: index.php");
    } else {
        header("Location: login.php");
    }
?>