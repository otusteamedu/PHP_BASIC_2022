<?php

/**
 * Подгружаем требуемый html-шаблон, возвращаем содержимое
 */
function getTemplate($realpath, $template) {
    ob_start();
    if (file_exists($realpath.'/templates/'.$template.'.html')) // Отправляем в буфер содержимое файла
        include ($realpath.'/templates/'.$template.'.html');
    else
        include (realpath(dirname(__FILE__).'/../fyb-content/templates/'.$template.'.html'));
    $variables = ob_get_clean(); // Очищаем буфер и возвращаем содержимое
    return $variables; // Возвращение текста из файла
}

/**
 * @param $realpath - путь к папке с модулем приложения
 * @param $title - заголовок страницы
 * @param $placeholder - подсказка в поле формы
 *  * Функции открывания и закрывания модуля приложения
 */
function OpenAppsModule($realpath, $title, $placeholder) {
    global $fyb;
    if (file_exists($realpath . '/config/menu.routing.php'))
        require_once ($realpath . '/config/menu.routing.php');
    else
        require_once (realpath(dirname(__FILE__).'/..') . '/fyb-content/config/menu.routing.php');
    if (file_exists($realpath . '/config/apps.routing.php'))
        require_once ($realpath . '/config/apps.routing.php');
    // подгружаем шаблон шапки сайта
    $head_tpl_variables = str_replace(
            array (
                    "%TITLE%",
                ),
            array (
                    $title,
                ),
            getTemplate($realpath, "main.head")
    );
    echo $head_tpl_variables;
    // подгружаем шаблон верхней панели
    $navbar_tpl_variables = str_replace(
            array (
                    "%PLACEHOLDER%",
                ),
            array (
                    $placeholder,
                ),
            getTemplate($realpath, "main.navbar")
    );
    echo $navbar_tpl_variables;
    ?>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                    <?php
                    // подгружаем шаблон боковой панели
                    foreach ( $sidebar_menu as $item ) {
                        $sidebar_tpl_variables = str_replace(
                            array(
                                "%URL%",
                                "%TITLE%",
                            ),
                            array (
                                $item["url"],
                                $item["title"],
                            ),
                            getTemplate($realpath, "container.sidebar")
                        );
                        echo $sidebar_tpl_variables;
                    }
                    ?>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <?php
}

function CloseAppsModule($realpath) {
    ?>
    </main>
    </div>
    </div>

    <?php
    // подгружаем шаблон подвала сайта
    $footer_tpl_variables = str_replace(
        array (
            "%TITLE%",
        ),
        array (
            '',
        ),
        getTemplate($realpath, "main.footer")
    );
    echo $footer_tpl_variables;
    ob_end_flush();
    exit;
}

/**
 * В PHP IP-адрес клиента доступен в переменной $_SERVER['REMOTE_ADDR'], но не всегда она содержит истинный
 * т.к. клиент может использовать прокси. Для определение истинного адреса можно использовать функцию:
 */
function getIP($default = '') {
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

/**
 * форматирование телефонного номера
 */
function phone_format($phone) {
    $phone = trim($phone);
    $result = preg_replace(
        array(
            '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{3})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
            '/[\+]?([7|8])[-|\s]?(\d{3})[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
            '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
            '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
            '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{3})/',
            '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{3})[-|\s]?(\d{3})/',
        ),
        array(
            '+7 ($2) $3-$4-$5',
            '+7 ($2) $3-$4-$5',
            '+7 ($2) $3-$4-$5',
            '+7 ($2) $3-$4-$5',
            '+7 ($2) $3-$4',
            '+7 ($2) $3-$4',
        ),
        $phone
    );
    return $result;
}