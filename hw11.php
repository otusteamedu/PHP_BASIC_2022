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

function getWordsCountFromFile(\resource $fd): int
{
    $wordsCount = 0;
    while($line = fgets($fd)){
        $wordsCount += count(explode($line,' '));
    }
    return $wordsCount;
}

$fd = fopen('test.txt','r');
echo getWordsCountFromFile($fd);
fclose($fd);

//3.
//Есть csv файл с таким содержимым:
//Name;Surname;Phone;Email;CreatedAt
//Иван;Семенов;+79031231212;ivan@mail.ru;12.01.2017
//Анна;Кошкина;;;18.09.2021
//Удалить клиента Иван, добавить любого другого клиента, сохранить результат в csv, используя функции для работы с csv

