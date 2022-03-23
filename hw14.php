//hw14
//Задание 1

<?php
declare(strict_types=1);
 
function sumINT(int $int1, int $int2) {
    return $int1+$int2;
};

function subtractionINT(int $int1, int $int2) {
    return $int1-$int2;
};

function multiplicationINT(int $int1, int $int2) {
    return $int1*$int2;
};

function segmentationINT(int $int1, int $int2) {
    return $int1/$int2;
};

var_dump(sumInt(2,4));
var_dump(subtractionINT(2,4));
var_dump(multiplicationINT(2,4));
var_dump(segmentationINT(2,4));
?>




//Задание 2

<?php
declare(strict_types=1);

function mathOperation(int $arg1,int $arg2, string $operation) {
  switch ($operation) {
      case "сложение": return $arg1+$arg2; break;
      case "вычитание": return $arg1-$arg2; break;
      case "умножение": return $arg1*$arg2; break;
      case "деление": return $arg1/$arg2; break;
  }
};
var_dump(mathOperation(2,4,'вычитание'));
?>




//Задание 3

<?php
phpinfo();
echo date('Y');
?>


//Задание 4

<?php
declare(strict_types=1);

function power(int $val, int $pow) {
    if ($pow <= 0) {
        return 1;
    }
        return $val*power($val,$pow - 1); 
    };
var_dump(power(2,4));
?>