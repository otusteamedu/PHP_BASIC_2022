<?php

/**
 * Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла.
 * for (…){ // здесь пусто}
 *
 * @return void
 */
function bare_for(): void
{
    for ($i = 0; $i < 10; print($i++ . PHP_EOL)) {
        // здесь пусто
    }
}

// bare_for();
