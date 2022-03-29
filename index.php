<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gravity</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600&display=swap" rel="stylesheet"><title>Lesson 5 Home work 4</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<section class="gravity">
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                <a href="">
                    <img src="img/logo.svg"  alt="Logo">
                </a>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
                <a href="#">
                    Home
                </a>
            </div>
            <div class="col-lg-2 d-none d-lg-block">
                <a href="#" style="opacity: 0.3;">
                    Contacts
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-1" style="text-align: right;">
                <a href="">
                    <img src="img/menu.svg"  alt="Menu icon">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-7">
                <div class="placeholder-left">
                    <span>
                        Shooting Stars
                    </span>
                    <h2>
                        Pictures In The Sky
                    </h2>
                    <p>
                        Many people has the notion that enlightenment is one state. Many also believe that when
                        it is attained, a person is forever in that state.
                    </p>
                    <div class="social-icons">
                        <button>
                            Get started
                        </button>
                        <a href="">
                            <img src="img/twitter.svg"  alt="Icon twitter">
                        </a>
                        <a href="">
                            <img src="img/linkedin.svg"  alt="Icon Linkedin">
                        </a>
                        <a href="">
                            <img src="img/google.svg"  alt="Google icon">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-5">
                <div class="placeholder-right">
                    <img src="img/beatiful-girl.png"  alt="Beatiful Girl"  style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>
</section>
<?php
echo date("Y");
?>
</body>
</html>