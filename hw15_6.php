<?php
$menu = [
    'Home' => ['page1', 'page2', 'page3'],
    'Service' => ['page1', 'page2', 'page3'],
    'Works' => ['page1', 'page2', 'page3'],
    'News' => ['page1', 'page2', 'page3'],
    'Contact' => ['page1', 'page2', 'page3'],
];
?>

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
                    <?php
                    foreach ($menu as $key => $value) {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false"> <?php echo $key; ?></a>
                            <div class="dropdown-menu">
                                <?php
                                foreach ($value as $item) {
                                    ?>
                                    <a class="dropdown-item" href="#"><?php echo $item ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>