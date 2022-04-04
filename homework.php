<?php

echo "<h2>Дополнительное задание 1:</h2>";
/**
 * function iWantToBeLogged() {
 * $result = 'I was called at ' . date('Y-m-d H:i:s')
 * echo $result;
 * }
 * iWantToBeLogged();
 * $result должен записываться в лог-файл. Последующие вызовы функции должны дописывать значения в конец файла, не удаляя содержимого.
 * Каждая запись на новой строке. Между вызовами скрипта файл также не должен очищаться
 */
$filename = __DIR__ . '/data/result.log';
function iWantToBeLogged($filename) {
    $result = 'I was called at ' . date('Y-m-d H:i:s') . PHP_EOL;
    file_put_contents($filename, $result, FILE_APPEND);
    echo $result;
}

iWantToBeLogged($filename);

echo "<h2>Дополнительное задание 2:</h2>";
/**
 * Дополнительное задание 2:
 * Подсчитать количество слов в файле. Содержимое файла взять любое. Предусмотреть то, что файл может быть большим и не помещаться в оперативную память.
 *
 * решение вариант 1:
 * плохой, т.к. весь файл грузится в оперативку:
 */
$filename = __DIR__ . '/data/2.txt';
echo "Количество слов в файле - ";
echo str_word_count(file_get_contents($filename));
echo "<br><br>";
/**
 * решение вариант 2:
 */
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
$word_count = str_word_count($contents);
fclose($handle);
echo "Количество слов в файле - ";
echo $word_count;
echo "<br><br>";
/**
 * решение вариант 3:
 * читаем файл построчно
 */

$row_count = 0;
$word_count_total = 0;

if (($handle = fopen($filename, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
            $word_count_total = $word_count_total + str_word_count($data[$c]);
        }
        $row_count++;
    }
    fclose($handle);
}
echo "Количество слов в файле - $word_count_total Строчек - $row_count ";

/**
 * Дополнительное задание 3:
 * Есть csv файл с таким содержимым:
 * Name;Surname;Phone;Email;CreatedAt
 * Иван;Семенов;+79031231212;ivan@mail.ru;12.01.2017
 * Анна;Кошкина;;;18.09.2021
 * Удалить клиента Иван, добавить любого другого клиента, сохранить результат в csv, используя функции для работы с csv.
 */
echo "<h2>Дополнительное задание 3:</h2>";
$filename = __DIR__ . '/data/3.csv';
$handle = fopen($filename, "r");
while (($csv_data = fgetcsv($handle, 0, ";")) !== FALSE) {
    $csv_array[] = $csv_data;
}
fclose($handle);
echo '<pre>';
var_dump($csv_array);
echo '</pre>';

/**
 * удалить в массиве
 */


/**
 * добавим клиента, вариант 1:
 */
$text = 'Петров;Пётр;;;11.02.1102;';
$text = iconv('utf-8', 'windows-1251', $text);
$handle = fopen($filename, "a");
fwrite ($handle, $text . PHP_EOL);
fclose($handle);

/**
 * добавим клиента, вариант 2:
 * но не получается записать на кириллице
 */
$handle = fopen($filename, "a");
$text_array = array('Сидоров', 'Сидр', '', '', '12.03.1203');
fputcsv($handle, $text_array, ';');
fclose($handle);


