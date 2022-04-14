<?php
declare(strict_types=1);
//Дополнительные задания:
//1.
//function iWantToBeLogged()
//{
//    $result = 'I was called at ' . date('Y-m-d H:i:s')
//echo $result;
//}
//iWantToBeLogged();
//$result должен записываться в лог-файл. Последующие вызовы функции должны дописывать значения в конец файла,
// не удаляя содержимого. Каждая запись на новой строке. Между вызовами скрипта файл также не должен очищаться

function iWantToBeLogged()
{
    $result = 'I was called at ' . date('Y-m-d H:i:s'.PHP_EOL);
    $fd = fopen('log_time.txt','a');
    fwrite($fd, $result);
    fclose($fd);
    echo $result;
}
for($i=0; $i < 2; $i++){
    iWantToBeLogged();
    sleep(rand(1,2));
}


echo '<br>';
//2.
//Подсчитать количество слов в файле. Содержимое файла взять любое.
// Предусмотреть то, что файл может быть большим и не помещаться в оперативную память

function getWordsCountFromFile($fd): int
{
    $wordsCount = 0;
    while($line = fgets($fd)){
        $wordsArray = ($line === "\r\n") ? [] : explode(" ", $line);
        $wordsCount += count($wordsArray);
    }
    return $wordsCount;
}

$fd = fopen('test.txt','r');
echo getWordsCountFromFile($fd);
fclose($fd);

// не смог определить тип передаваемого аргумента в функцию, как resource.
//
//



//3.
//Есть csv файл с таким содержимым:
//Name;Surname;Phone;Email;CreatedAt
//Иван;Семенов;+79031231212;ivan@mail.ru;12.01.2017
//Анна;Кошкина;;;18.09.2021
//Василий;;+79258526548;vasya@mail.ru;13.01.2020
//Удалить клиента Иван, добавить любого другого клиента, сохранить результат в csv, используя функции для работы с csv
function deleteByName(string $name, array $fileData): array
{
    for($i = 1; $i < count($fileData); $i++){
        if($fileData[$i][0] === $name) unset($fileData[$i]);
    }
    return $fileData;
}

function addRecord(array $record, array $fileData): array
{
    $fileData[] = $record;
    return $fileData;
}

function getArrayFromFile(string $fileName): array
{
    $fileData = [];
    $fd = fopen($fileName, 'r');
    while($row = fgetcsv($fd, 0, ';')){
        $fileData[] = $row;
    }
    fclose($fd);
    return $fileData;
}

function saveArrayToFile(string $fileName, array $fileData): void
{
    $fd = fopen($fileName, 'w');
    foreach($fileData as $row){
        fputcsv($fd,$row, ';');
    }
    fclose($fd);
}

$newRecord = ['Михаил', 'Петров', '+324751214775', 'man@gmail.com', '13.05.1995'];
$fileData = getArrayFromFile("ex3.txt");
$fileData = deleteByName('Иван', $fileData);
$fileData = addRecord($newRecord, $fileData);
saveArrayToFile("ex3.txt", $fileData);

