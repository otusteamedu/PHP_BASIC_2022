<?php

$filename = "txt/File.txt";

$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
echo "Количество слов в файле ";
echo count(preg_split('#[\s,]+#', $contents));
