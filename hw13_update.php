//hw13

//#1
<?php

$a = -21;
$b = 0;
// если положительные -> -
// если отрицательные -> *
// если разных знаков -> +

//положительные
if ($a >= 0 && $b >= 0) {
    echo $a-$b;
}
//отрицательные
elseif ($a < 0 && $b < 0) {
    echo $a*$b;
}
elseif (($a < 0 && $b >= 0) || ($a >= 0 && $b < 0)) {
    echo $a+$b;
}
else {
    echo "Что то пошло не так, но php тебе уже сообщил об этом";
}
?>

//#2
<?php

$a=0;
//$а значение в промежутке [0..15]

switch ($a) {
    case 0:
       echo "\r0";
    case 1:
        echo "\r1";
    case 2:
        echo "\r2";
    case 3:
        echo "\r3";
    case 4:
        echo "\r4";
    case 5:
        echo "\r5";
    case 6:
        echo "\r6";
    case 7:
        echo "\r7";
    case 8:
        echo "\r8";
    case 9:
        echo "\r9";
    case 10:
        echo "\r10";
    case 11:
        echo "\r11";
    case 12:
        echo "\r12";
    case 13:
        echo "\r13";
    case 14:
        echo "\r14";
    case 15:
        echo "\r15";
        break;
}
?>


//#3 

<?php

$a = 1;

$return_value = match($a) {
    default => forCycle()
};

function forCycle():int {
    global $a;
    if ($a <=15) {
        for($i = $a; $i <= 15; $i++){
        echo $i.PHP_EOL;;
        }
    } else {echo '$a больше 15'.PHP_EOL;};
    return 1;
}
var_dump($return_value);