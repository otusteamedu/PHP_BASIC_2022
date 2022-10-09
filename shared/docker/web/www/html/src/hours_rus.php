<?php

function hours_rus(string $inputHour): string
{
    switch ($inputHour) {
        case 1:
        case 21:
            return "$inputHour час";
        case 2:
        case 3:
        case 4:
        case 22:
        case 23:
        case 24:
            return "$inputHour часа";
        default:
            return "$inputHour часов";
    }
}
