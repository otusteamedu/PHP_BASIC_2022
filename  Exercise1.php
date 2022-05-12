<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira%20Sans:wght@400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="services">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-7">
                <a href="#"><img src="img/logo.svg"></a>
            </div>
            <div class="d-sm-none d-md-block col-md-3 col-lg-2">
                <a href="#" class="link-menu"><p class="paragraph">Home</p></a>
            </div>
            <div class="d-sm-none d-md-block col-md-3 col-lg-2">
                <a href="#" class="link-menu"><p class="menu-contacts">Contacts</p></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-1" style="text-align: right;">
                <a href="#" class="burger-menu-xs"><img src="img/menu_icon.png"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-7">
                <div>
                    <p class="text-label">Shooting Stars</p>
                    <h2>Pictures In The Sky</h2>
                    <p class="paragraph">Many people has the notion that enlightenment is one state. Many also believe that when it is attained, a person is forever in that state.</p>
                </div>
                <div class="my-container-logo">
                    <div>
                        <a href="#"><button class="button">Get Started</button></a>
                    </div>
                    <div>
                        <a href="#"><img src="img/twitter.svg"></a>
                    </div>
                    <div>
                        <a href="#"><img src="img/linkedin.png"></a>
                    </div>
                    <div>
                        <a href="#"><img src="img/google.png"></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5">
                <img src="img/placeholder.png" alt="placeholder" style="float: right;">
            </div>
        </div>
    </div>
</div>

</body>
<foot>
    <?php
    echo date('Y');
    ?>
</foot>

</html>