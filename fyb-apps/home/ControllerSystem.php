<?php
$fyb['module_name'] = basename(dirname(__FILE__));
$realpath = realpath(dirname(__FILE__).'/../../fyb-apps/' . $fyb['module_name']);
$title = 'ИС Аналитика';
$placeholder = 'Что-нибудь для поиска';
$template = new Template();
$template->OpenAppsModule($realpath, $title, $placeholder);

echo $title;

$template->CloseAppsModule($realpath);