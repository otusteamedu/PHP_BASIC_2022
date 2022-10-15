<?php

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case 'sum':
            return $arg1 + $arg2;

        case 'sub':
            return $arg1 - $arg2;

        case 'mlt':
            return $arg1 * $arg2;

        case 'div':
            return $arg1 / $arg2;
    }
}
$result = mathOperation(3, 2, 'mlt');
echo $result;
