<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lesson-4, bootstrap</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<section class="container">
    <header class="header">
        <div class="justify-content-between d-flex flex-row bd-highlight mb-2">
            <div class="d-flex">
                <img src="img/Logo.svg" alt="logo">
                <ul class="nav navbar-light">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Service
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Works
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            News
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <button class="btn-log">Log In</button>
                <button class="btn-sign">Sign Up</button>
            </div>
        </div>
    </header>

    <main>
        <div style="display: flex">
            <div class="container-demo">
                <p class="demo-h1">Bootstrap 5 theme</p>
                <p class="demo-h2">crafted by <b>ThemeWagon</b></p>
                <p class="demo-h3">ThemeWagon offers an wide array of category-oriented
                    Free and Premium Bootstrap HTML Templates and Themes. </p>
                <button class="btn-demo">Check Demo</button>
            </div>
            <div>
                <img src="img/Illusration.svg" alt="illustration">
            </div>
        </div>
    </main>

</section>
</body>

<footer class="container text-center">
    <div style="margin-top: 10px">
        <p class="alert alert-info">Ваш ip адрес: <?php echo($_SERVER['HTTP_X_REAL_IP'])?></p>
        <p class="alert alert-info"> Дата генерации страницы: <?php echo date('d-m-Y H:i:s')?></p>
    </div>
</footer>
</html>