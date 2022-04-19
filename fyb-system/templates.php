<?php

class Template {

    private function getTemplate($realpath, $template) {
        ob_start();
        if (file_exists($realpath.'/templates/'.$template.'.html')) // Отправляем в буфер содержимое файла
            include ($realpath.'/templates/'.$template.'.html');
        else
            include (realpath(dirname(__FILE__).'/../fyb-content/templates/'.$template.'.html'));
        $variables = ob_get_clean(); // Очищаем буфер и возвращаем содержимое
        return $variables; // Возвращение текста из файла
    }

    public function OpenAppsModule($realpath, $title, $placeholder) {
        require_once (ROOT . '/fyb-config/routing.php');
        // подгружаем шаблон шапки сайта
        $head_tpl_variables = str_replace(
            array (
                "%TITLE%",
            ),
            array (
                $title,
            ),
            Template::getTemplate($realpath, "main.head")
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
            Template::getTemplate($realpath, "main.navbar")
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
                            Template::getTemplate($realpath, "container.sidebar")
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

    public function CloseAppsModule($realpath) {
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
            Template::getTemplate($realpath, "main.footer")
        );
        echo $footer_tpl_variables;
        ob_end_flush();
        exit;
    }

}