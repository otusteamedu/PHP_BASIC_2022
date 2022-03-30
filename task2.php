<?php

function mathOperation(int|float $arg1,int|float $arg2, string $operation): int|float|string {
    switch ($operation) {
        case "+":
            return $arg1 + $arg2;
        case "-":
            return $arg1 - $arg2;
        case "*":
            return $arg1 * $arg2;
        case "/":
            return $arg1 / $arg2;
        default:
            return "Operation $operation is not provided";
    }
}

echo mathOperation(3, 4, "+") . PHP_EOL;
echo mathOperation(3, 4, "-") . PHP_EOL;
echo mathOperation(3, 4, "/") . PHP_EOL;
echo mathOperation(3, 4, "*") . PHP_EOL;
echo mathOperation(3, 4, "5324") . PHP_EOL;
