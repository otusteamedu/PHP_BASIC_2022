<?php

$a = rand(0,15);
echo 'Число $a = ' . $a . PHP_EOL;

echo implode(",",range($a, 15));