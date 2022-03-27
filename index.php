<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My first html page</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    echo "1. Задание<br>";
    $a = -5;
    $b = 10;
    if($a >= 0 and $b >= 0){
        echo $a - $b;
    }else if($a < 0 and $b < 0){
        echo $a * $b;
    }else if($a * $b < 0){
        echo $a + $b;
    }

    echo "<br><br>";
    echo "2. Задание<br>";
    $a = 7;
    switch ($a){
        case 0:
            echo "0<br>";
        case 1:
            echo "1<br>";
        case 2:
            echo "2<br>";
        case 3:
            echo "3<br>";
        case 4:
            echo "4<br>";
        case 5:
            echo "5<br>";
        case 6:
            echo "6<br>";
        case 7:
            echo "7<br>";
        case 8:
            echo "8<br>";
        case 9:
            echo "9<br>";
        case 10:
            echo "10<br>";
        case 11:
            echo "11<br>";
        case 12:
            echo "12<br>";
        case 13:
            echo "13<br>";
        case 14:
            echo "14<br>";
        case 15:
            echo "15<br>";
    }

    echo "<br><br>";
    echo "3. Задание<br>";
    $a = 9;
    $result = match($a){
        $a => range($a,15),
    };
    var_dump($result);

    ?>
</body>
</html>