<?php
    session_start();
    if (isset($_SESSION['user']) && isset($_SESSION['success'])){
    session_destroy();
    header("Location: index.php");
    echo $_SESSION['user'];
    echo $_SESSION['success'];
    } else {
        header("Location: login.php");
    }
?>