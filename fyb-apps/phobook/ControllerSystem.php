<?php
$fyb['module_name'] = basename(dirname(__FILE__));
$realpath = realpath(ROOT.'/fyb-apps/' . $fyb['module_name']);
$title = 'Телефонный справочник';
$placeholder = 'Фамилия, Имя или Отчество';
$template = new Template();
$template->OpenAppsModule($realpath, $title, $placeholder);

echo $fyb['module_name'];
if(empty($segment[1]) && $method === 'GET') {
    echo $fyb['module_name'];
} elseif($segment[1] === 'add' && $method === 'GET')
     echo 'отображаем форму добавления товара';
elseif($segment[1] === 'add' && $method === 'POST')
    echo 'добавляем новый товар в базу';

$template->CloseAppsModule($realpath);