<?php
$db = new mysqli($is31cs['dbhost'], $is31cs['dbuname'], $is31cs['dbpass'], $is31cs['dbname']);
$db->query("SET NAMES 'utf8' ");

if ($db -> connect_error) {
    printf("Ошибка при подключении: %s\n", $db -> connect_error);
    exit();
};