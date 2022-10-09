<?php
    require('src/hours_rus.php');
    require('src/minutes_rus.php');
    require('src/power.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/normalize.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    <title>ДЗ_14: Функции</title>
</head>

<body>
    <header>
        <h1>Возведение в степень</h1>
    </header>

    <main>
        <?php
            $val = random_int(-10, 10);
            $power = random_int(-5, 5);

            $itog = power($val, $power);
        ?>
        <p>Число: <?=$val;?></p>
        <p>Степень: <?=$power;?></p>
        <p>Итог: <?=$itog ?? 'Не существует';?></p>
    </main>
    
    <footer>
        <nav>
            <p class="nav_item"><a class="nav_link" href="/index.php">На главную</a></p>
            <!-- <p class="nav_item"><a class="nav_link" href="/var_exchange.php">Обмен значениями переменных</a></p> -->
        </nav>
        <?php
            $dtiNow = new DateTimeImmutable('now');
            $dateNow = $dtiNow->format('d.m.Y');
            $hoursNow = $dtiNow->format('H');
            $minutesNow = $dtiNow->format('i');
        ?>
        <p><em> Сформировано: <?=$dateNow;?>, <?=hours_rus($hoursNow);?> <?=minutes_rus($minutesNow);?>. </em></p>
        <p><em> PHP_VERSION: <?=$_SERVER['PHP_VERSION'];?> </em></p>
    </footer>
</body>

</html>
