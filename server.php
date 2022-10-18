<?php 
    session_start();
    $conn = new mysqli('localhost', 'root', 'root', 'edusogno');
    //$_SESSION['hasRegistered'] = false;
    //$_SESSION['message'] = '';

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
    $events = [];

    //user reg
    if (isset($_POST['addUser'])){
        //$errors = [];
        $firstName = $_POST['firstName']; 
        $lastName = $_POST['lastName']; 
        $email = $_POST['email']; 
        $password = $_POST['password'];

        // errors checks start here
        //# firstname
        if (strlen(trim($firstName)) == 0) {
            $errors['firstName'] = 'Devi inserire un nome per poterti registrare!';
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

        //user added to server if email is not already included only if there are no errors
        if(count($errors) == 0){
            $usersQuery = "SELECT * FROM `utenti` WHERE `email`='$email'";
            $result = $conn->query($usersQuery);
            if($result && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    //# email check
                    //var_dump($row);
                    //echo $row['email'];
                    //echo ' utente già registrato';
                    $errors['alreadySignedEmail'] = 'Email già in uso!';
                } 
            } elseif ($result && count($errors) == 0) {
                //echo count($errors);
                //echo 'utente non registrato';
                // $addUserQuery = "INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`) VALUES ('$firstName','$lastName','$email','$password')";
                // $addUser = $conn->query($addUserQuery);
                $addUserQuery = $conn->prepare("INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`) VALUES ( ? , ? , ? , ? )");
                $addUserQuery->bind_param("ssss", $firstName, $lastName, $email, $password);
                $addUserQuery->execute();
                $_SESSION['message'] = 'Registrazione avvenuta con successo!';
                $_SESSION['hasRegistered'] = true;
            } else {
                echo 'terza via - errore query?';
            }
        } else {
            //echo 'risparmio risorse';
            //var_dump($errors);
        }
    }

    //user login
    if (isset($_POST['login'])){
        //$errors = [];
        $email = $_POST['email']; 
        $password = $_POST['password'];

        //errors checks
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

        //user login if email and psw are correct and only if there are no errors
        if(count($errors) == 0){
            $userQuery = "SELECT * FROM `utenti` WHERE `email`='$email' AND `password`='$password'";
            $result = $conn->query($userQuery);
            if($result && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    var_dump($row);
                    $_SESSION['user'] = $row['nome'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['success'] = 'Logged in';
                    header('Location: index.php');
                } 
                
            } else if ($result) {
                $_SESSION['message'] = 'Invalid email or password.';
                echo $_SESSION['message'];
            }
        } else {
            echo 'errori';
        }
    }

    if(isset($_SESSION['email'])){
        $eventsQuery = "SELECT * FROM `eventi` WHERE `attendees` LIKE '%$email%'";
        $result = $conn->query($eventsQuery);
        if($result && $result->num_rows > 0){
            $events = [];
            while ($row = $result->fetch_assoc()){
                array_push($events, $row);
            }
        }
    }


?>