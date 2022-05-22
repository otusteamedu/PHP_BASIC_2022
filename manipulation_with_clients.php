<?php
$filename = 'csv/clients.csv';

function read(string $filename)
{
    $handle = fopen($filename, 'r'); //Открываем csv для чтения

    $array_line_full = array(); //Массив будет хранить данные из csv
    //Проходим весь csv-файл, и читаем построчно. 3-ий параметр разделитель поля
    while (($line = fgetcsv($handle, 0, ";")) !== FALSE) {
        $array_line_full[] = $line; //Записываем строчки в массив
    }
    fclose($handle); //Закрываем файл

    unset($array_line_full[1]);
    return $array_line_full;
}

function add(string $filename, array $fields)
{
    $handle = fopen($filename, 'a+');

    $puts = fputcsv($handle, $fields, ';');

    fclose($handle);

    return $puts;
}

//$array = read($filename);

$add = add($filename, [
    'Михаил', 'Петраков', '', 'test@test.ru', ''
]);
$read = read($filename);

echo '<pre>';
var_dump($add);
print_r($read);
