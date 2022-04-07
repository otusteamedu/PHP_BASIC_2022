<?php

$file = "textfortask2.txt";

function wordsInFileCounter(string $file) {
    $handle = fopen($file, "r");
    $separatorsInASCII = [0, 32, 10, 13];
    $wordIsStarted = false;
    $wordCnt = 0;
    while(!feof($handle)) {
        $currentSymbol = ord(fgetc($handle));
        $currentSymbolIsDelimiter = in_array($currentSymbol, $separatorsInASCII);
        if ($currentSymbolIsDelimiter) {
            if ($wordIsStarted) $wordCnt++;
            $wordIsStarted = false;
        } else $wordIsStarted = true;
    }
    if ($wordIsStarted) $wordCnt++;
    return $wordCnt;
}

echo ($words = wordsInFileCounter($file));