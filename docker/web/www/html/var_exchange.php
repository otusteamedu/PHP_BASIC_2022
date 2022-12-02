<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/normalize.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    <title>ДЗ_12: Обмен значениями переменных</title>
</head>

<body>
    <header>
        <h1>Обмен значениями переменных</h1>
    </header>

    <main>
        <p>До:</p>
        <?php
            $a = 'А';
            $b = 'Б';
        ?>
        <ul>
            <li>$a = <?=$a;?></li>
            <li>$b = <?=$b;?></li>
        </ul>
        <p><code>list($a, $b) = [$b, $a];</code></p>
        <p>После:</p>
        <?php
            list($a, $b) = [$b, $a];
        ?>
        <ul>
            <li>$a = <?=$a;?></li>
            <li>$b = <?=$b;?></li>
        </ul>
    </main>
    
    <footer>
        <nav>
            <p class="nav_item"><a class="nav_link" href="/index.php">На главную</a></p>
            <p class="nav_item"><a class="nav_link" href="type_conversion.php">Приведение типов</a></p>
        </nav>
        <?php
            $dtiNow = new DateTimeImmutable('now');
            $strNow = $dtiNow->format('d.m, H:i');
        ?>
        <p><em>Сформировано: <?=$strNow;?>; PHP_VERSION: <?=$_SERVER['PHP_VERSION'];?></em></p>
    </footer>
</body>

</html>
