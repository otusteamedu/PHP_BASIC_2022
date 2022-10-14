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
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

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

            if ($val < 0) {
                $leftBrace = '(';
                $rightBrace = ')';
            } else {
                $leftBrace = '';
                $rightBrace = '';
            }
            
        ?>
        <p class="mb-0"><?=$leftBrace;?><?=$val;?><?=$rightBrace;?><sup><?=$power;?></sup> = <?=($itog ?? 'не существует');?></p>
        <p class="text-right"><em><small>Перезагрузите страницу для обновления вычисления</small></em></p>
    </main>
    
    <footer>
        <nav>
            <p class="nav_item"><a class="nav_link" href="/index.php">На главную</a></p>
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
