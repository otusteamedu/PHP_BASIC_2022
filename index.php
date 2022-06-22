<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!--Подключены шрифты Manrope-->
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>

    <head>
        <nav>
            <a href="#Services" style="color: #fff;">Our Services</a>
        </nav>
    </head>
    <!--почему-то не получилось задать хэдеру отдельный цвет фона-->
    <section>
        <div class="container">
            <!--First Container-->
            <h2>Services that connect you to <br>
                <!--как заменить здесь БР?--> your users</h2>
            <div class="flex-container">
                <div class="cards">
                    <div class="icon"><img src="icon/icon-mob-app.svg" alt="icon-mob-app"></div>
                    <div>
                        <h3>Mobile Application</h3>
                    </div>
                    <div class="card-p">
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Mattis et sed nam sem tellus erat.</p>
                    </div>
                    <div class="div-explore">
                        <a href="#explore" class="a-explore">Explore <img src="icon/right-arrow.png" alt="icon-arrow"></a>
                    </div>
                </div>
                <div class="cards">
                    <div class="icon"><img src="icon/icon-mob-app.svg" alt="icon-mob-app"></div>
                    <div>
                        <h3>Web Application</h3>
                    </div>
                    <div class="card-p">
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Mattis et sed nam sem tellus erat.</p>
                    </div>
                    <div class="div-explore">
                        <a href="#explore" class="a-explore">Explore <img src="icon/right-arrow.png" alt="icon-arrow"></a>
                    </div>
                </div>
                
                <div class="cards">
                    <div class="icon"><img src="icon/icon-mob-app.svg" alt="icon-mob-app"></div>
                    <div>
                        <h3>User Interface Design</h3>
                    </div>
                    <div class="card-p">
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Mattis et sed nam sem tellus erat.</p>
                    </div>
                    <div class="div-explore">
                        <a href="#explore" class="a-explore">Explore <img src="icon/right-arrow.png" alt="icon-arrow"></a>
                    </div>
                </div>
                
                <div class="cards">
                    <div class="icon"><img src="icon/icon-mob-app.svg" alt="icon-mob-app"></div>
                    <div>
                        <h3>Strategy and Branding</h3>
                    </div>
                    <div class="card-p">
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Mattis et sed nam sem tellus erat.</p>
                    </div>
                    <div class="div-explore">
                        <a href="#explore" class="a-explore">Explore <img src="icon/right-arrow.png" alt="icon-arrow"></a>
                    </div>
                </div>
                
                <div class="cards">
                    <div class="icon"><img src="icon/icon-mob-app.svg" alt="icon-mob-app"></div>
                    <div>
                        <h3>Performance Marketing</h3>
                    </div>
                    <div class="card-p">
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Mattis et sed nam sem tellus erat.</p>
                    </div>
                    <div class="div-explore">
                        <a href="#explore" class="a-explore">Explore <img src="icon/right-arrow.png" alt="icon-arrow"></a>
                    </div>
                </div>
                
                <div class="cards">
                    <div class="icon"><img src="icon/icon-mob-app.svg" alt="icon-mob-app"></div>
                    <div>
                        <h3>Project Management</h3>
                    </div>
                    <div class="card-p">
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Mattis et sed nam sem tellus erat.</p>
                    </div>
                    <div class="div-explore">
                        <a href="#explore" class="a-explore">Explore <img src="icon/right-arrow.png" alt="icon-arrow"></a>
                    </div>
                </div>
                
                
                <!--конец флекс-контейнера-->
            </div>
            <div class="flex-explore-all">
                <div class="explore-all">
                    <a href="#Explore all" style="color: #fff;"> Explore all <img src="icon/white-arrow.png"
                            alt="icon-white-arrow"></a>
                </div>
            </div>
            <!--как указать цвет определенной ссылке? в классе цвет прописан, но текст ссылки идет по умолчанию-->
        </div>
    </section>
</body>
<footer class="container">
    <div>
    <?php
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true? - автоматическое приведение типов при == приводит строку к значению int 5, 0 просто откидывается
    var_dump((int)'012345');     // Почему 12345? - вначале сказано что это int, соответственно строка привела его к десятиричному числу, потому что вот так. 0 не превращает число в шеснадцетиричное
    var_dump((float)123.0 === (int)123.0); // Почему false? - === - сначала сравнение идентичности. Сначала проверяется тип, потом значение. Если типы не соответствуют - сразу false и дальше проверка не идет
    var_dump((int)0 === (int)'hello, world'); // Почему true? - проверено сначала на соответствие типов, дальше произошло приведение str к int. Строка стала ровна int 0, тк. не содержит в себе цисел Вначале. 
    var_dump((int)'1 Hello Worl')// Вначале стоит 1 и строка приводится к int 1
    ?>
    </div>
</footer>
</html>

