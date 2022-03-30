<?php

function getNumbersDivisibleByThree():array {
    $i=0;
    $nubmers = [];
    while ($i <= 100) {
        if ($i % 3 == 0) {
            $nubmers[] = $i;
        }
        $i++;
    }
    return $nubmers;
}

print_r(getNumbersDivisibleByThree());