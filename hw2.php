<?php
function plus(int|float $a, int|float $b): int|float
{
	return $a+$b;
}

function minus(int|float $a, int|float $b): int|float
{
	return $a-$b;
}

function multiply(int|float $a, int|float $b): int|float
{
	return $a*$b;
}

function division(int|float $a, int|float $b): int|float
{
	if ($b == 0) return 'error';
	return $a/$b;
}

function mathOperation(int|float $arg1, int|float $arg2, string $operation): int|float 
{
	switch ($operation){
		case 'plus':
			return plus($arg1, $arg2);
		case 'minus':
			return minus($arg1, $arg2);
		case 'multiply':
			return multiply($arg1, $arg2);
		case 'division':
			return division($arg1, $arg2);
	}
}


echo mathOperation(60, 6, 'division');

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

function power(int $val, int $pow): int
{
	if ($pow == 0) {
		return 1;
	}
	if ($pow < 0) {
		return power(1/$val, -$pow);
	}
	return $val * power($val, $pow-1);
}

echo power(10, -2);


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


function getHourName(int $hour): string
{
    if ($hour<1 || $hour>24)
        return 'Превышен интервал "часа"';
    
    return 'час' . match ($hour) {
        1, 21 => '',
        2, 3, 4, 22, 23, 24 => 'а',
        default => 'ов',
    };
}

function getMinuteName(int $minute): string
{
    if ($minute<1 || $minute>60)
        return 'Превышен интервал "минут"';
    
    return 'минут' . match (1) {
        preg_match('/^(1|([2-5]1))$/', $minute) => 'а',
        preg_match('/^([2-4]|([2-5][2-4]))$/', $minute) => 'ы',
        default => '',
    };

}

function getMinuteNameVer2(string $minute): string
{
    if ($minute<1 || $minute>60)
        return 'Превышен интервал "минут"';

    $end = 0;
    if ($minute > 20){
    	$end = $minute[1];
    } else if ($minute < 5) {
    	$end = $minute;
    }
    
    return 'минут' . match ($end) {
        '1' => 'а',
        '2', '3', '4' => 'ы',
        default => '',
    };
}

function getTimeWithRussianName(int $ver = 1): string
{
    $h = date('G');
    $m = date('i');
    $return = $h.' '.getHourName($h).' '.$m.' ';
    $return .= match ($ver) {
        2 => getMinuteNameVer2((string)$m),
        default => getMinuteName($m)
    };

    return $return;
}

echo getTimeWithRussianName();
echo getTimeWithRussianName(2);


?>