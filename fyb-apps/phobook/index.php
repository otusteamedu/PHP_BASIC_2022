<?php

if(isset($_GET['op']))
    $op = $_GET['op'];
if(isset($_GET['act']))
    $act = $_GET['act'];

$fyb['module_name'] = basename(dirname(__FILE__));
$realpath = realpath(dirname(__FILE__).'/../../fyb-apps/' . $fyb['module_name']);
$title = 'Телефонный справочник';
$placeholder = 'Фамилия, Имя или Отчество';
OpenAppsModule($realpath, $title, $placeholder);

function main() {
    global $fyb, $realpath, $act;
    // подгружаем шаблон основного содержимого
    include ($realpath . '/templates/container.main.html');
}
switch($op) {
    default:
        main();
        break;
}

CloseAppsModule($realpath);
?>