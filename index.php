<html>
<head>
<h1> OTUS Home work 16 </h1>
</head>
<body> 

<!--/* Задание 1
Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все картинки 
в уменьшенном виде и форму для загрузки нового изображения. При клике на фотографию она должна открыться в браузере в новой вкладке. 
Размер картинок можно ограничивать с помощью свойства width. Галерея должна собираться средствами PHP (scandir) -->
<h2>Альбом машины</h2>

<form enctype="multipart/form-data" action="upload.php" method="POST">
    Отправить этот файл: <input name="userfile" type="file" />
    <input type="submit" value="Отправить файл" />
</form>

<?php
$dir = '.\image';

$car = array_diff(scandir($dir), array('..', '.'));

foreach($car as $key => $carImg) {
    echo ("<a href=/image/$carImg><img src=/image/$carImg width=300px height=200px> </a>");
    }

?>

<?php
/* Дополнительное задание 1
$result должен записываться в лог-файл. Последующие вызовы функции должны дописывать значения в конец файла, не удаляя содержимого. 
Каждая запись на новой строке. Между вызовами скрипта файл также не должен очищаться
*/

function iWantToBeLogged()
{
    $result = 'I was called at ' . date('Y-m-d H:i:s').PHP_EOL;
    return $result;
};

$a = iWantToBeLogged();

$fp = fopen("c:\\OpenServer\\domains\\otus.php\\mylogs\\info.txt", 'a');
if (fwrite($fp, $a.PHP_EOL) === FALSE) {
    echo "Не могу произвести запись в файл ($fp)".PHP_EOL;
    exit;
}
    echo "Ура! Записали ($a) в файл ($fp)".PHP_EOL;


/*    $b = str_word_count(rld!");
    echo $b;*/


fclose($fp);
?>

<?php
/* Дополнительное задание 2
Подсчитать количество слов в файле. Содержимое файла взять любое. 
Предусмотреть то, что файл может быть большим и не помещаться в оперативную память
*/
$filename = "c:\\OpenServer\\domains\\otus.php\\mylogs\\info.txt";
$handle = fopen($filename, "rb");
$contents = fread($handle, filesize($filename));
$count_word = str_word_count($contents);
echo $count_word;
fclose($handle);
?>




<?php
/* Дополнительное задание 3
Есть csv файл с таким содержимым
Удалить клиента Иван, добавить любого другого клиента, сохранить результат в csv, используя функции для работы с csv
*/


/* 
Открываем csv на чтение и помещаем его в массив
*/
$filecsv = "c:\\OpenServer\\domains\\otus.php\\mylogs\\1.csv";

if (($fpcsvread = fopen($filecsv, "r")) !== FALSE) {
	while (($data = fgetcsv($fpcsvread, 0, ";")) !== FALSE) {
		$list[] = $data;
	}
	fclose($fpcsvread);
    echo '<pre>';
    print_r($list);
    echo '</pre>';
	
}

/*в получившимся многомерном массиве ищем Ивана на втором уровне и удаляем если найдено всю строку*/

foreach ($list as $k => $v1) {
    foreach ($v1 as $v2) {
        echo $v2.': '.PHP_EOL;
        if (mb_substr($v2, 0, 5) === "Иван"){
            unset($list[$k]); 
        }
    }
}



/*Добавить новую запись*/
array_push($list, array(
    "Гузель",
    "Кормушкина",
    "845",
    "pusto@che.ru",
    '13.10.2021'
    ));


echo '<pre>';
print_r($list);
echo '</pre>';



/*Записываем похудевший массив без Ивана в файл csv и исптываем счастье! наконецто это запустилось*/

$fpcsvwrite = fopen($filecsv, 'w');
    foreach ($list as $newcsv) {
        fputcsv($fpcsvwrite, $newcsv, ';');
    }
    fclose($fpcsvwrite);


?>


</body>
</html>