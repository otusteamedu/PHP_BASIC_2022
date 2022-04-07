<?php

$file = "textfortask2.txt";

function wordsInFileCounter(string $file) {
    $words = [];
    $word = "";
    $handle = fopen($file, "r");
    $separatorsInASCII = [32, 10, 13];
    while(!feof($handle)) {
        $symbol = fgetc($handle);
        $symbolInASCII = ord($symbol);
        if (!in_array($symbolInASCII, $separatorsInASCII)) {
            $word .= $symbol;
        } else {
            $words[] = $word;
            $word = "";
        }

    }
    return count(array_diff($words, array(''))) + 1;
}

echo ($words = wordsInFileCounter($file));
