<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/normalize.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    <title>ДЗ_12: Приведение типов</title>
</head>

<body>
    <header>
        <h1>Приведение типов</h1>
    </header>

    <main>
        <p>
            <code> $a = 5; $b = '05'; </code>
            <?php
                $a = 5;
                $b = '05';
            ?>
        </p>
        <p>
            <code> var_dump($a == $b); </code>
            <?php var_dump($a == $b); ?><br>
            <cite>Строковая переменная $b неявно приводится к int(5) и становится равной по значению $a.</cite>
        </p>
        <p>
            <code> var_dump((int)'012345'); </code>
            <?php var_dump((int)'012345'); ?><br>
            <cite>Явное приведение строки к целочисленному типу. Поскольку строка содержит только десятичные цифры, то они становятся значением целого числа в десятеричной системе. Ведущий ноль отбрасывается.</cite>
        </p>
        <p>
            <code> var_dump((float)123.0 === (int)123.0); </code>
            <?php var_dump((float)123.0 === (int)123.0); ?><br>
            <cite>Поскольку используется строгое сравнение, а операнды явным образом приводятся к разным типам, то в итоге получаем false.</cite>
        </p>
        <p>
            <code> var_dump((int)0 === (int)'hello, world'); </code>
            <?php var_dump((int)0 === (int)'hello, world'); ?><br>
            <cite>Строковый операнд после явного приведения к целочисленному типу становится равным int(0) поскольку не начинается с цифр, и тем самым будет равен другому операнду как по значению, так и по типу.</cite>
        </p>
    </main>
    
    <footer>
        <nav>
            <p class="nav_item"><a class="nav_link" href="/index.php">На главную</a></p>
            <p class="nav_item"><a class="nav_link" href="/var_exchange.php">Обмен значениями переменных</a></p>
        </nav>
        <?php
            $dtiNow = new DateTimeImmutable('now');
            $strNow = $dtiNow->format('d.m, H:i');
        ?>
        <p><em>Сформировано: <?=$strNow;?>; PHP_VERSION: <?=$_SERVER['PHP_VERSION'];?></em></p>
    </footer>
</body>

</html>
