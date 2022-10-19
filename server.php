<?php 
    session_start();
    $conn = new mysqli('localhost', 'root', 'root', 'edusogno');

    $firstName = ""; 
    $lastName = ""; 
    $email = ""; 
    $password = "";
    $errors = [];
    $events = [];

    //user reg
    if (isset($_POST['addUser'])){
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
        } elseif (strlen(trim($email)) > 45) {
            $errors['email'] = 'L\'email inserita è troppo lunga! Usa un massimo di 45 caratteri.';
        } elseif (strpos($email, '@') == false) {
            $errors['email'] = 'Inserisci una email valida.';
        }
        //# password
        if (strlen(trim($password)) == 0) {
            $errors['password'] = 'Devi inserire una password!';
        }
        if (strlen(trim($password)) > 45) {
            $errors['password'] = 'La password inserita è troppo lunga! Usa un massimo di 45 caratteri.';
        }

        //user added to server if email is not already included only if there are no errors
        if(count($errors) == 0){
            $sql = "SELECT * FROM utenti WHERE email=?";
            $usersQuery = $conn->prepare($sql);
            $usersQuery->bind_param('s', $email);
            $usersQuery->execute();
            $result = $usersQuery->get_result();
            if($result && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    //# email check
                    $errors['alreadySignedEmail'] = 'Email già in uso!';
                } 
            } elseif ($result && count($errors) == 0) {
                $addUserQuery = $conn->prepare("INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`) VALUES ( ? , ? , ? , ? )");
                $addUserQuery->bind_param("ssss", $firstName, $lastName, $email, $password);
                $addUserQuery->execute();
                $_SESSION['message'] = 'Registrazione avvenuta con successo!';
                $_SESSION['hasRegistered'] = true;
            } else {
                echo 'terza via - errore query?';
            }
        }
    }

    //user login
    if (isset($_POST['login'])){
        $email = $_POST['email']; 
        $password = $_POST['password'];

        //errors checks
        //# email
        if (strlen(trim($email)) == 0) {
            $errors['email'] = 'Non hai inserito l\'email!';
        } elseif (strlen(trim($email)) > 255) {
            $errors['email'] = 'L\'email inserita è troppo lunga! Usa un massimo di 255 caratteri.';
        } elseif (strpos($email, '@') == false) {
            $errors['email'] = 'Inserisci una email valida.';
        }
        //# password
        if (strlen(trim($password)) == 0) {
            $errors['password'] = 'Devi inserire una password!';
        }

        //user login if email and psw are correct and only if there are no errors
        if(count($errors) == 0){
            $sql = "SELECT * FROM `utenti` WHERE `email`=? AND `password`=?";
            $userQuery = $conn->prepare($sql);
            $userQuery->bind_param('ss', $email, $password);
            $userQuery->execute();
            $result = $userQuery->get_result();
            if($result && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $_SESSION['user'] = $row['nome'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['success'] = 'Logged in';
                    header('Location: index.php');
                } 
                
            } else if ($result) {
                $_SESSION['message'] = 'Invalid email or password.';
            }
        } else {
            echo 'errori';
        }
    }
    //user events retrieval
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
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