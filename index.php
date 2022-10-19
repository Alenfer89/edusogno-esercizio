<?php include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edusogno</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>

<body>
    <?php require('header.php') ; ?>
    <main class="position-relative">
        <div class="ax-content">
            <?php if(isset($_SESSION['success'])): ; ?>
                <div class="container-fluid p-5">
                    <div class="row justify-content-center px-5">
                        <div class="col-12">
                            <h2 class="text-center pb-5 ax-main-titles">
                                Ciao <span class="text-uppercase"><?php echo $_SESSION['user']; ?></span>, ecco i tuoi eventi:
                            </h2>
                        </div>
                        <?php if(count($events) > 0) :  ?>
                            <?php foreach($events as $event) : ; ?>
                                <div class="col-3 p-4 mx-auto ax-window">
                                    <h2 class="fw-bold">
                                        <?php echo $event['nome_evento'] ; ?>
                                    </h2>
                                    <p class="text-secondary">
                                        <?php echo $event['data_evento'] ; ?>
                                    </p>
                                    <button class="btn btn-primary text-uppercase w-100">
                                        join
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="col-3 mx-auto ax-window p-5 text-center">
                                Non hai eventi
                            </div>
                        <?php endif ; ?>
                        <div class="col-12 text-center">
                            <p class="pt-5">
                                <a href="logout.php" class="btn btn-danger">Logout</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php  else  : ; ?>
                <div class="container-fluid p-5">
                    <div class="row justify-content-center px-5">
                        <div class="col-12">
                            <h2 class="text-center pb-5 ax-main-titles">
                                Benvenuto in edusogno!
                            </h2>
                        </div>
                        <div class="col-6 p-5 ax-window">
                            <h4 class="ax-main-titles">
                                Catchy title
                            </h4>
                            <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus labore blanditiis itaque quo, at fugiat molestias ullam fuga voluptatibus beatae. Necessitatibus porro animi rerum tempora blanditiis earum eligendi repellendus recusandae.
                            </p>
                            <p class="py-5 text-center">
                                Effettua l'accesso per consultare la tua area personale.
                            </p>
                            <div class="row text-center py-3 m-0">
                                <div class="col-6">
                                    Vai al <a href="login.php" class="fw-bold">login</a>.
                                </div>
                                <div class="col-6">
                                    Non hai un account? <a href="register.php" class="fw-bold">Registrati</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ; ?>
        </div>
        <?php require('background.php') ; ?>
    </main>
</body>

</html>