<?php 
    session_start();
    $conn = new mysqli('localhost', 'root', 'root', 'edusogno');

    // if($conn->connect_error){
    //     echo 'errori';
    // } else {
    //     echo 'ok';
    // }

    // $object = [
    //     'errore' => 'questo è un errore',
    // ]

    $firstName = ""; 
    $lastName = ""; 
    $email = ""; 
    $password = "";
    $errors = [];

    if (isset($_POST['addUser'])){
        //$errors = [];
        $firstName = $_POST['firstName']; 
        $lastName = $_POST['lastName']; 
        $email = $_POST['email']; 
        $password = $_POST['password'];

        // errors checks 
        if (strlen(trim($firstName)) == 0) {
            $errors['firstName'] = 'Devi inserire un nome!';
        }
        if (strlen(trim($firstName)) > 45) {
            $errors['firstName'] = 'Il nome inserito è troppo lungo! Usa un massimo di 45 caratteri.';
        }
    }

?>