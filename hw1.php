<?php
echo "Задание 1<br>";
$a = rand(-15,15);
$b = rand(-15,15);
echo "a=".$a."<br>b=".$b."<br>";
if ($a>0 && $b>0){
	echo "Разность 1 равна:".($a-$b)."<br>";
	echo "Разность 2 равна:".($b-$a);
} else if ($a<0 && $b<0) {
	echo "Произведение равно:".($a*$b);
} else {
	echo "Сумма равна:".($a+$b);
}
echo "<br><br><br>";
echo "Задание 2<br>";
$a = rand(0,15);
echo "a=".$a." <br>";

show($a);

function show($a){
    if ($a > 15 || $a < 0){
        echo "Out of rang <br>";
        return false;
    }

    switch ($a) {
        case 0:
            echo "0 <br>";
        case 1:
            echo "1 <br>";
        case 2:
            echo "2 <br>";
        case 3:
            echo "3 <br>";
        case 4:
            echo "4 <br>";
        case 5:
            echo "5 <br>";
        case 6:
            echo "6 <br>";
        case 7:
            echo "7 <br>";
        case 8:
            echo "8 <br>";
        case 9:
            echo "9 <br>";
        case 10:
            echo "10 <br>";
        case 11:
            echo "11 <br>";
        case 12:
            echo "12 <br>";
        case 13:
            echo "13 <br>";
        case 14:
            echo "14 <br>";
        case 15:
            echo "15 <br>";
    } 
}


echo "Задание 3<br>";
$result = match ($a) {
    0, 1, 2, 3, 4, 5, 6, 7, 8, 9 => show($a),
    10, 11, 12, 13, 14, 15 => show($a),
};


?>