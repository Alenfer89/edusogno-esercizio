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
        //# firstname
        if (strlen(trim($firstName)) == 0) {
            $errors['firstName'] = 'Devi inserire un nome!';
        }
        if (strlen(trim($firstName)) > 45) {
            $errors['firstName'] = 'Il nome inserito è troppo lungo! Usa un massimo di 45 caratteri.';
        }
        //# lastname
        if (strlen(trim($lastName)) == 0) {
            $errors['lastName'] = 'Devi inserire un cognome!';
        }
        if (strlen(trim($lastName)) > 45) {
            $errors['lastName'] = 'Il cognome inserito è troppo lungo! Usa un massimo di 45 caratteri.';
        }
        //# email
        if (strlen(trim($email)) == 0) {
            $errors['email'] = 'Non hai inserito l\'email!';
        } elseif (strlen(trim($email)) > 255) {
            $errors['email'] = 'L\'email inserita è troppo lunga! Usa un massimo di 255 caratteri.';
        } elseif (strpos($email, '@') == false) {
            //. (strpos($email, '@') == false) || (strpos($email, '.') < strpos($email, '@'))
            $errors['email'] = 'Inserisci una email valida.';
        }
        //# password
        if (strlen(trim($password)) == 0) {
            $errors['password'] = 'Devi inserire una password!';
        }
    }

?>