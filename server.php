<?php 
    session_start();
    $conn = new mysqli('localhost', 'root', 'root', 'edusogno');

    // if($conn->connect_error){
    //     echo 'errori';
    // } else {
    //     echo 'ok';
    // }

    $firstName = ""; 
    $lastName = ""; 
    $email = ""; 
    $password = "";
    $errors = [];
?>