<?php

require_once (dirname(__FILE__).'/fyb-config/variables.php');
require_once (dirname(__FILE__).'/fyb-system/functions.php');

/** Запрещаем доступ к сайту
 *
 * Фильтрация по списку:
 * if (in_array($_SERVER['REMOTE_ADDR'], $black_list_of_IP)) { exit; }
 * В .htaccess применяется конструкция Order, Allow, Deny
 * Order Allow,Deny
 * Allow from all
 * Deny from 192.168.255.255
 * Deny 172.31.255.255
 *
 * Фильтрация по диапазону:
 * $ip = @ip2long($_SERVER['REMOTE_ADDR']); foreach($range_black_list_of_IP as $ips) { if ($ip >= @ip2long($ips[0]) && $ip <= @ip2long($ips[1])) { exit; } }
 * В .htaccess диапазон блокируемых IP задаётся в виде бесклассовой адресации (CIDR). Для его формирования можно использовать сервис ip2cidr.com
 * Order Allow,Deny
 * Allow from all
 * Deny from 192.168.0.0/16
 * Deny from 172.16.0.0/12
 *
 * Фильтрация по маске:
 * foreach($mask_black_list_of_IP as $ips) { if (preg_match('/' . $ips . '/', $_SERVER['REMOTE_ADDR'])) { exit() } }
 * В .htaccess нельзя задать маску вида 192.168.0.*, но можно не указывать последние части адреса – будет заблокирован весь диапазон.
 * Order Allow,Deny
 * Allow from all
 * Deny from 192.168.
 * Deny from 172.16.
 */
if (!in_array(getIP(), $allow_list_of_IP))
    die ("This website is using a security service to protect itself from online attacks.<br>Access denied from your IP-adress:<br>" . getIP());

$CurSec = empty($_GET['module'])?null:$_GET['module']; // осуществляем запрос вида: ?module=

if (empty($CurSec) or ($CurSec == 'home')) // если запрос пустой, или запрос вида ?module=home
    include(dirname(__FILE__).'/fyb-apps/home/index.php'); // то грузим главную страничку
elseif (file_exists(dirname(__FILE__).'/fyb-apps/'.basename($CurSec).'/index.php')) // если запрос другого вида, и файл запроса существует
    include(dirname(__FILE__).'/fyb-apps/'.basename($CurSec).'/index.php'); // грузим страничку с запросом
else
    include(dirname(__FILE__).'/fyb-apps/error/index.php'); // иначем грузим страницу модуля ошибок

?>