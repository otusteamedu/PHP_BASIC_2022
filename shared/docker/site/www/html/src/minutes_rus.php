<?php

/**
 * Добавляет к числу слово "час" в соответствующем падеже.
 *
 * @param int|string $inputMinutes числовое значение минут
 *
 * @return ?string Числовое значение минут с добавлением слова "минута" в падеже или null,
 *  если входной аргумент выходит за 60-минутный диапазон.
 */
function minutes_rus(int|string $inputMinutes): ?string
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
        $inputMinutes < 0 || $inputMinutes > 59 => null,
        default => "$inputMinutes минут"
    };
}
