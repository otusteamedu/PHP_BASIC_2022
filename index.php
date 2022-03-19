<?php
function sum (int $a, int $b) {
    return $a + $b;
}

echo "Сложение (10 + 20) = ".sum(10, 20);

//===============================================

function subtraction (int $a, int $b) {
    return $a - $b;
}

echo "\rВычитание (50 - 40) = ".subtraction(50, 40);

//===============================================

function multiplication (int $a, int $b) {
    return $a * $b;
}

echo "\rУмножение (10 * 20) = ".multiplication(10, 20);

//===============================================

function division (int $a, int $b) {
    return $a / $b;
}

echo "\rДеление (10 / 2) = ".division(10, 2);

//===============================================

function mathOperation(int $arg1, int $arg2, string $operation){
    switch ($operation){
        case '+' : $result = $arg1 + $arg2;
            break;
        case '-' : $result = $arg1 - $arg2;
            break;
        case '*' : $result = $arg1 * $arg2;
            break;
        case '/' : $result = $arg1 / $arg2;
            break;
    }

    return $result;
}

echo "\rСложение (50 + 5) = ".mathOperation(50, 5, '+');
echo "\rВычитание (50 - 5) = ".mathOperation(50, 5, '-');
echo "\rУмножение (50 * 5) = ".mathOperation(50, 5, '*');
echo "\rДеление (50 / 5) = ".mathOperation(50, 5, '/');

//===============================================

/*Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон,
вывести текущий год в подвале при помощи встроенных функций PHP.
Делал уже такое задание в домшке № 12 https://github.com/otusteamedu/PHP_BASIC_2022/tree/AShishak/HW-12
Там шаблон выложен с выводом даты, чтобы сократить Вам время, привожу вывод*/

echo(date('Y'));

//===============================================

function power(int $val, int $pow){

    if ($pow == 0){
        return 1;
    }

    return $val * power($val, $pow - 1);
}

echo "\rВозводим число 4 в степень 2: ".power(4, 2);

//===============================================

function currentTime(){

    //Правильно писать час
    $hrs_v1 = [1,21];

    //Правильно писать часа
    $hrs_v2 = [2,3,4,22,23];

    //Правильно писать часов
    $hrs_v3 = [0,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];

    //Правильно писать минут
    $min_v1 = [5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,25,26,27,28,29,30,35,36,37,38,39,40,45,46,47,48,49,50,55,56,57,58,59];

    //Правильно писать минута
    $min_v2 = [1,21,31,41,51];

    //Правильно писать минуты
    $min_v3 = [2,3,4,22,23,24,32,33,34,42,43,44,52,53,54];

    $datetime = getdate();
    $hrs = $datetime['hours'];
    echo "\r".$hrs;
    $min = $datetime['minutes'];
    echo "\r".$min;

    switch ($hrs){
        case in_array($hrs, $hrs_v1) : $hrs .= ' час';
            break;

        case in_array($hrs, $hrs_v2) : $hrs .= ' часа';
            break;

        case in_array($hrs, $hrs_v3) : $hrs .= ' часов';
            break;
    }

    switch ($min){
        case in_array($min, $min_v1) : $min .= ' минут';
            break;

        case in_array($min, $min_v2) : $min .= ' минута';
            break;

        case in_array($min, $min_v3) : $min .= ' минуты';
            break;
    }

    return $hrs." ".$min;
}

echo "\r".currentTime();
