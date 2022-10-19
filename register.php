<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>
<body>
    <?php require('header.php') ; ?>
    <main class="position-relative">
        <div class="ax-content">
            <div class="container-fluid p-5">
                <div class="row justify-content-center px-5">
                    <div class="col-12 text-center pb-5">
                        <h2>
                            Crea il tuo account:
                        </h2>
                    </div>
                    <div class="col-6 ax-window p-4">
                        <form action="register.php" method="POST">
                            <div class="mb-3">
                                <label for="inputFirstName" class="form-label">Nome</label>
                                <?php if(isset($errors['firstName'])) {; ?>
                                    <span class="ms-5 text-danger">
                                        <?php echo $errors['firstName']; ?>
                                    </span>
                                <?php } ; ?>
                                <input type="text" class="form-control" id="inputFirstName" name='firstName'>
                            </div>
                            <div class="mb-3">
                                <label for="inputLastName" class="form-label">Cognome</label>
                                    <?php if(isset($errors['lastName'])) {; ?>
                                        <span class="ms-5 text-danger">
                                            <?php echo $errors['lastName']; ?>
                                        </span>
                                    <?php } ; ?>
                                <input type="text" class="form-control" id="inputLastName" name='lastName'>
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label">Email address</label>
                                    <?php if(isset($errors['email'])) {; ?>
                                        <span class="ms-5 text-danger">
                                            <?php echo $errors['email']; ?>
                                        </span>
                                    <?php } ; ?>
                                <input type="text" class="form-control" id="inputEmail" aria-describedby="emailHelp" name='email'>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">Password</label>
                                    <?php if(isset($errors['password'])) {; ?>
                                        <span class="ms-5 text-danger">
                                            <?php echo $errors['password']; ?>
                                        </span>
                                    <?php } ; ?>
                                <input type="password" class="form-control" id="inputPassword" name='password'>
                            </div>
                            <button type="submit" class="btn btn-primary text-uppercase w-100" name='addUser'>registrati</button>
                        </form>
                    </div>
                </div>
                <?php if(isset($_SESSION['hasRegistered']) && $_SESSION['hasRegistered']){ ; ?>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <p>
                            <?php echo $_SESSION['message'] ; ?>
                        </p>
                        <a href="login.php">vai al login</a>
                    </div>
                </div>
                <?php } ; ?>
                <?php if(isset($errors['alreadySignedEmail'])){ ; ?>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <p class="text-error">
                            <?php echo $errors['alreadySignedEmail']; ?>
                        </p>
                    </div>
                </div>
                <?php } ; ?>
            </div>
        </div>
        <?php require('background.php') ; ?>
    </main>
</body>
</html>