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

    return $array_line_full;
}

function add(string $filename, array $fields = [], string $mode = 'a+')
{
    $handle = fopen($filename, $mode);

    foreach ($fields as $field) {
        fputcsv($handle, $field, ';');
    }

    fclose($handle);

    return true;
}

function delete(array $rows, string $name)
{
    $nameKey = null;
    $afterDeleteRows = [];

    foreach ($rows as $row) {
        foreach ($row as $key => $field) {
            if (is_null($nameKey) && $field == 'Name') {
                $nameKey = $key;
                break;
            }
        }

        if (!is_null($nameKey) && $row[$nameKey] == $name) {
            continue;
        }

        $afterDeleteRows[] = $row;
    }

    return $afterDeleteRows;
}

$rows = read($filename);
$rows = delete($rows, 'Иван');
add($filename, $rows, 'w+');
add($filename, [
    [
        'Михаил11', 'Петраков11', '1121', 'test1@test.ru', '2122'
    ]
], 'w+');
$rows = read($filename);

echo '<pre>';
print_r($rows);
