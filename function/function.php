<?php
function writeLog (string $text):void {
    $text = date('Y-m-d H:i:s')."_". $text . PHP_EOL;
    $file = fopen('C:\repositories\PHP_BASIC_2022\log.txt','a'); //указать прямой путь на сервере
    fwrite($file,$text);
    fclose($file);
};
function putDataCsv (array $userData, mixed $img): void {
    $file = fopen('C:\repositories\PHP_BASIC_2022\data.csv','a'); //указать прямой путь на сервере
    fputcsv(
        $file,
        $userData,
        ";"
    );
    fclose($file);
}

?>