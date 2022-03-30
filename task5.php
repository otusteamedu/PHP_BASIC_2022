<?php

function translitStr(string $string) {
    $transliterationArray = [
        ' ' => '_'
    ];

    $value = strtr($string, $transliterationArray);

    return $value;
}

echo translitStr("лобанов ты дурак");