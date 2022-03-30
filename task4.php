<?php

function power(int|float $val, int $pow): int|float {
    if ($pow == 0) {
        return 1;
    }
    if ($pow == 1) {
        return $val;
    }
    return $val * power($val, $pow-1);
}

echo power(2,11);