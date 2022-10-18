<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edusogno</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <nav>
        <a href="register.php">register</a>
        <a href="login.php">login</a>
    </nav>

    <h1>
        INDEX
    </h1>

    <?php if(isset($_SESSION['success'])): ; ?>
        <p>
            welcome 
            <span>
                <?php echo $_SESSION['user'] . ' '; ?>
            </span>
            tizio loggato
        </p>
        <p>
            <form action="login.php" method="GET">
                <button type='submit' class="btn btn-primary" name='login'>logout</button>
            </form>
        </p>
    <?php  else  : ; ?>
        <p>
            tizio non loggato
        </p>
    <?php endif ; ?>

</body>

</html>