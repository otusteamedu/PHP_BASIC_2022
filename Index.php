<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-2 col-lg-2">
                    <img class="Logo" src="img/icons/Logo.svg" alt="Logo">
                </div>
                <div class="col-md-6">
                    <nav class="header-nav">

                        <a class="nav-link" href="#">
                            Home
                            <img src="img/icons/arrow.svg">
                        </a>
                        <a class="nav-link" href="#">
                            Service
                            <img src="img/icons/arrow.svg">
                        </a>
                        <a class="nav-link" href="#">
                            Works
                            <img src="img/icons/arrow.svg">
                        </a>
                        <a class="nav-link" href="#">
                            News
                            <img src="img/icons/arrow.svg">
                        </a>
                        <a class="nav-link" href="#">
                            Contact
                            <img src="img/icons/arrow.svg">
                        </a>

                    </nav>
                    <!-- /.header-nav -->
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="buttons">
                        <button class="login">Log In</button>
                        <button class="signup">Sign up</button>
                    </div>
                    <!-- /.buttons -->
                </div>
            </div>
        </div>

        </div>
    </header>

    <section class="description">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-5 col-lg-6">
                    <div class="my-class">
                        <h2>Bootstrap 5 theme</h2>
                        <h3>crafted by ThemeWagon</h3>
                        <p>ThemeWagon offers an wide array of category-oriented
                            Free and Premium Bootstrap HTML Templates and Themes. </p>
                        <button class="button">Check Demo</button>
                    </div>
                    <!-- /.my-class -->
                </div>
                <div class="col-sm-12 col-md-7 col-lg-6">
                    <div class="pic">
                        <img class="People" src="img/People.png" alt="People">
                    </div>
                    <!-- /.pic -->
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <p>Все права защищены,
					
					<?php
					echo date("Y").".";
					?>
					
					</p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>