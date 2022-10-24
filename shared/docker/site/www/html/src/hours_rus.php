<?php

/**
 * Добавляет к числу слово "час" в соответствующем падеже.
 * Падеж определяется на основании формул вида 10k + m = $inputHour, где m находится в диапазоне 1..4 и k не равно 1.
 *
 * @param int|string $inputHour числовое значение часа
 *
 * @return string Числовое значение часа с добавлением слова "час" в падеже или сообщение об ошибке,
 *  если входной аргумент выходит за 24-часовой диапазон.
 */
function hours_rus(int|string $inputHour): string
{
    $base = "$inputHour час";

    return match (true) {
        ($inputHour < 0) || ($inputHour > 24) => 'число_вне_диапазона',
        ($inputHour - 1) % 10 === 0 && ($inputHour - 1) / 10 !== 1 => $base,
        ($inputHour - 2) % 10 === 0 && ($inputHour - 2) / 10 !== 1 => $base . 'а',
        ($inputHour - 3) % 10 === 0 && ($inputHour - 3) / 10 !== 1 => $base . 'а',
        ($inputHour - 4) % 10 === 0 && ($inputHour - 4) / 10 !== 1 => $base . 'а',
        default => $base . 'ов'
    };
}
