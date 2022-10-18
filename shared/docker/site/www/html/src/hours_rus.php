<?php

/**
 * Добавляет к числу слово "час" в соответствующем падеже.
 *
 * @param int|string $inputHour числовое значение часа
 *
 * @return ?string Числовое значение часа с добавлением слова "час" в падеже или null,
 *  если входной аргумент выходит за 24-часовой диапазон.
 */
function hours_rus(int|string $inputHour): ?string
{
    if ($inputHour < 0 || $inputHour > 24) {
        return null;
    }

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
