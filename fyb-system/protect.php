<?php

class SecurityService {
    /**
     * В PHP IP-адрес клиента доступен в переменной $_SERVER['REMOTE_ADDR'], но не всегда она содержит истинный
     * т.к. клиент может использовать прокси. Для определение истинного адреса можно использовать функцию:
     */
    private function getIP($defaultIP = '') {
        $defaultIP = '0.0.0.0';
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            $currentIP = $_SERVER['HTTP_CLIENT_IP'];
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            $currentIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        elseif (!empty($_SERVER['REMOTE_ADDR']))
            $currentIP = $_SERVER['REMOTE_ADDR'];
        else
            return $defaultIP;
        return $currentIP;
    }

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
    public function protect() {
        SecurityService::getIP();
        if (!in_array(getIP(), $allow_list_of_IP))
            die ("This website is using a security service to protect itself from online attacks.<br>Access denied from your IP-adress:<br>" . getIP());
    }
}