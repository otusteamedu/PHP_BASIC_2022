<?php

/**
 * Меню сайта
 *
 * @var array [[razdel_name, razdel_href, [[subrazdel_name, subrazdel_href], ...]], ...]
 */
$menu = [
    [
        'Раздел 1',
        'razdel_1.php',
        []
    ],
    [
        'Раздел 2',
        'razdel_2.php',
        [
            ['Подраздел 2.1', 'subrazdel_21.php'],
            ['Подраздел 2.2', 'subrazdel_22.php'],
        ]
    ],
    [
        'Раздел 3',
        'razdel_3.php',
        []
    ],
];
