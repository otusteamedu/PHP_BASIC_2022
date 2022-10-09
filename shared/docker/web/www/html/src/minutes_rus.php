<?php

function minutes_rus(string $inputMinutes): string
{
    //"минутА"
    $caseOneDigits = [1, 21, 31, 41, 51];

    //"минутЫ"
    $caseTwoDigits = [
        2, 3, 4,
        22, 23, 24,
        32, 33, 34,
        42, 43, 44,
        52, 53, 54
    ];

    return match (true) {
        in_array((int)$inputMinutes, $caseOneDigits) => "$inputMinutes минута",
        in_array((int)$inputMinutes, $caseTwoDigits) => "$inputMinutes минуты",
        default => "$inputMinutes минут"
    };
}
