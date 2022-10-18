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
</head>
<body>
    <nav>
        <a href="index.php">index</a>
        <a href="login.php">login</a>
    </nav>
    <h1>
        REGISTER
    </h1>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="inputFirstName" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="inputFirstName" name='firstName'>
                    </div>
                    <?php if(isset($errors['firstName'])) {; ?>
                        <p>
                            <?php echo $errors['firstName']; ?>
                        </p>
                    <?php } ; ?>
                    <div class="mb-3">
                        <label for="inputLastName" class="form-label">Cognome</label>
                        <input type="text" class="form-control" id="inputLastName" name='lastName'>
                    </div>
                    <?php if(isset($errors['lastName'])) {; ?>
                        <p>
                            <?php echo $errors['lastName']; ?>
                        </p>
                    <?php } ; ?>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="inputEmail" aria-describedby="emailHelp" name='email'>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <?php if(isset($errors['email'])) {; ?>
                        <p>
                            <?php echo $errors['email']; ?>
                        </p>
                    <?php } ; ?>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name='password'>
                        <!-- <div id="passwordHelpBlock" class="form-text">
                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                        </div> -->
                    </div>
                    <?php if(isset($errors['password'])) {; ?>
                        <p>
                            <?php echo $errors['password']; ?>
                        </p>
                    <?php } ; ?>
                    <button type="submit" class="btn btn-primary" name='addUser'>Submit</button>
                </form>
            </div>
        </div>
        <!-- todo  -->
        <!-- todo  controlla condizione per cui il messaggio di reg rimane imperituro -->
        <!-- todo -->
        <?php if($_SESSION['hasRegistered']){ ; ?>
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
    </section>
</body>
</html>