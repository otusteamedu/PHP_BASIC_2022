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
//for($i=0; $i < 2; $i++){
//    iWantToBeLogged();
//    sleep(rand(1,2));
//}


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
//Удалить клиента Иван, добавить любого другого клиента, сохранить результат в csv, используя функции для работы с csv
function deleteByName(string $name, string $fileName): void
{
    $fd = fopen($fileName, 'r');
    $fieldsName = fgetcsv($fd, 0, ';');
    $fileData[] = $fieldsName;
    while($row = fgetcsv($fd, 0, ';')){
        $assoc_row = array_combine($fieldsName, $row);
        if($assoc_row["Name"] === "$name") continue;
        $fileData[] = $row;
    }
    fclose($fd);
    $fd = fopen($fileName, 'w');
    foreach($fileData as $row){
        fputcsv($fd,$row, ';');
    }
    fclose($fd);
}

function addRecord(array $record, $fd): bool
{

}


deleteByName('Иван', "ex3.txt");
