<?php
declare(strict_types=1);
$menu = [
    'Services' => ['Audit', 'Cleaning', 'Accounting'],
    'About As' => ['Contacts', 'History', 'Vacansies']
];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>.marginBottom-0 {
            margin-bottom: 0;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu > .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown-submenu > a:after {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #cccccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        .dropdown-submenu:hover > a:after {
            border-left-color: #555;
        }

        .dropdown-submenu.pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left > .dropdown-menu {
            left: -100%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        }
    </style>
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
            <?php foreach ($menu as $rubric => $submenu): ?>
                <div class="col-lg-2 d-none d-lg-block">
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$rubric;?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php foreach ($submenu as $subitem): ?>
                                <li>
                                    <a href="#">
                                        <?=$subitem;?>
                                    </a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                    </ul>

                </div>
            <?php endforeach;?>
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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
    (function ($) {
        $(document).ready(function () {
            $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function (event) {
                event.preventDefault();
                event.stopPropagation();
                $(this).parent().siblings().removeClass('open');
                $(this).parent().toggleClass('open');
            });
        });
    })(jQuery);
</script>
</body>
</html>