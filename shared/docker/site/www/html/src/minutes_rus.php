<?php

/**
 * Добавляет к числу слово "минута" в соответствующем падеже.
 * Падеж определяется на основании формул вида 10k + m = $inputMinutes, где m находится в диапазоне 1..4 и k не равно 1.
 *
 * @param int|string $inputMinutes числовое значение минут
 *
 * @return string Числовое значение минут с добавлением слова "минута" в падеже или сообщение об ошибке,
 *  если входной аргумент выходит за 60-минутный диапазон.
 */
function minutes_rus(int|string $inputMinutes): string
{
    $base = "$inputMinutes минут";

    return match (true) {
        ($inputMinutes < 0) || ($inputMinutes > 59) => 'число_вне_диапазона',
        ($inputMinutes - 1) % 10 === 0 && ($inputMinutes - 1) / 10 !== 1 => $base . 'а',
        ($inputMinutes - 2) % 10 === 0 && ($inputMinutes - 2) / 10 !== 1 => $base . 'ы',
        ($inputMinutes - 3) % 10 === 0 && ($inputMinutes - 3) / 10 !== 1 => $base . 'ы',
        ($inputMinutes - 4) % 10 === 0 && ($inputMinutes - 4) / 10 !== 1 => $base . 'ы',
        default => $base
    };
}
