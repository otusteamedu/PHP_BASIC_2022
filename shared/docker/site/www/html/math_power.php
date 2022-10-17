<?php
    require 'src/hours_rus.php';
    require 'src/minutes_rus.php';
    require 'src/power.php';

    $title = 'ДЗ_14: Функции';
    require 'head.php';
?>

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
       <?php include 'foot.php'; ?>
    </footer>
</body>

</html>
