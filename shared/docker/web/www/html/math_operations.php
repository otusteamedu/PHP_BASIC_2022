<?php
    require('src/hours_rus.php');
    require('src/minutes_rus.php');
    require('src/mathOperation.php');

    $title = 'ДЗ_14: Функции';
    require('head.php');
?>

<body>
    <header>
        <h1>Математические операции</h1>
    </header>

    <main>
        <?php
            $a = random_int(-10, 10);
            $b = random_int(-5, 5);

            $itog_mul = mathOperation($a, $b, 'mul');
            $itog_div = mathOperation($a, $b, 'div');
            $itog_sum = mathOperation($a, $b, 'sum');
            $itog_diff = mathOperation($a, $b, 'diff');
        ?>
        <p><?="a = $a";?>, <?="b = $b";?></p>
        <p><?=("итог сложения = $itog_sum");?></p>
        <p><?=("итог вычитания = $itog_diff");?></p>
        <p><?=("итог умножения = $itog_mul");?></p>
        <p><?=("итог деления = " . ($itog_div ?? 'недопустимая операция'));?></p>
        <p class="text-right"><em><small>Перезагрузите страницу для обновления вычисления</small></em></p>
    </main>
    
    <footer>
        <nav>
            <p class="nav_item"><a class="nav_link" href="/index.php">На главную</a></p>
        </nav>
       <?php include('foot.php'); ?>
    </footer>
</body>

</html>
