<?php

$data = [];
$i = 0;
$nameForDelete = "Иван";
$newUser = [
    "Farkhat", "Khusnutdinov", "+79878846868", "f1user5656@gmail.com", date("d.m.Y")
];
// Получаем содержимое csv и обрабатываем его: удаляем нужное имя, добавляем новое значение //
$handle = fopen("fortask3.csv", "r+");

while(($data[$i] = fgetcsv($handle, 0, ";")) !== FALSE) {
    if ($data[$i][0] === $nameForDelete) unset ($data[$i]);
    ++$i;
}
unset($data[$i]);

$data[] = $newUser;

//Перезаписываем содержимое файла новым массивом, удовлетворяющим условия

$handle = fopen("fortask3.csv", "w+");

foreach($data as $user) {
    fputcsv($handle, $user, ";");
}
fclose($handle);



