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
    <div class="row justify-content-center">
            <div class="col-6">
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="inputFirstName" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="inputFirstName" name='firstName'>
                    </div>
                    <div class="mb-3">
                        <label for="inputLastName" class="form-label">Cognome</label>
                        <input type="text" class="form-control" id="inputLastName" name='lastName'>
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="inputEmail" aria-describedby="emailHelp" name='email'>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name='password'>
                        <!-- <div id="passwordHelpBlock" class="form-text">
                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                        </div> -->
                    </div>
                    <button type="submit" class="btn btn-primary" name='addUser'>Submit</button>
                </form>
            </div>
        </div>
</body>
</html>