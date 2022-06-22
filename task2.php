<?php

$x = 0;

do {
	if ($x === 0) {
		echo "$x - это ноль" . PHP_EOL;
	} elseif ($x%2 === 0) {
		echo "$x - это четное число" . PHP_EOL;
	} else {
		echo "$x - это нечетное число" . PHP_EOL;
	}
	$x++;
}while ($x <= 10);