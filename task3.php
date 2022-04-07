<?php

$nameForDelete = "Farkhat";
$newUser = [
    "Farkhat", "Khusnutdinov", "+79878846868", "f1user5656@gmail.com", date("d.m.Y")
];
$fileName = "fortask3.csv";

/**
 * @param string $fileName
 * @return array|null
 */
function getDataFromCSV(string $fileName): array|null {
    $handle = fopen($fileName, "r+");
    if ($handle === false) return null;
    $i = 0;
    while(($data[$i] = fgetcsv($handle, 0, ";")) !== FALSE) {
        ++$i;
    }
    unset($data[$i]);
    return $data;
}

/**
 * @param string $fileName
 * @param string $nameForDelete
 * @return bool
 */
function deleteRowFromCSV(string $fileName, string $nameForDelete): bool {
    $handle = fopen($fileName, "r+");
    if ($handle === false) return false;
    $i = 0;
    while(($data[$i] = fgetcsv($handle, 0, ";")) !== FALSE) {
        if ($data[$i][0] === $nameForDelete) unset ($data[$i]);
        ++$i;
    }
    fclose($handle);
    unset($data[$i]);
    $handle = fopen("$fileName", "w+");
    if ($handle === false) return false;
    foreach($data as $user) {
        fputcsv($handle, $user, ";");
    }
    fclose($handle);
    return true;
}

/**
 * @param string $fileName
 * @param array $user
 */
function addUserToCSV(string $fileName, array $user):bool {
    $handle = fopen("$fileName", "a");
    if ($handle === false) return false;
    if (fputcsv($handle, $user, ";") === false) return false;
    if (!fclose($handle)) return false;
    return true;
}

var_dump(addUserToCSV($fileName, $newUser));
print_r(getDataFromCsv($fileName));
var_dump(deleteRowFromCSV($fileName, $nameForDelete));
print_r(getDataFromCsv($fileName));




