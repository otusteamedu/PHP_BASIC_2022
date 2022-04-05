<?php

$handle = fopen("textfortask2.txt", "r");
$words = 0;

while(!feof($handle)) {
    $str = fgets($handle);
    $words += substr_count($str, " ") + 1;
}

echo "Всего слов: " . $words;
