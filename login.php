<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <nav>
        <a href="index.php">index</a>
        <a href="register.php">register</a>
    </nav>
    <h1>
        LOGIN
    </h1>
    <section class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
            <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="inputEmail" aria-describedby="emailHelp" name='email'>
                        <div id="emailHelp" class="form-text">Scrivi l'email con cui hai effettuato la registrazione.</div>
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
                    <button type="submit" class="btn btn-primary" name='login'>Accedi</button>
                </form>
            </div>
        </div>
        <?php if(strlen($_SESSION['message']) > 0) : ; ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <?php echo $_SESSION['message'] ; ?>
            </div>
        </div>
        <?php endif  ; ?>

    </section>
</body>
</html>