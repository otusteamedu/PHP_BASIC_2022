<?php

$op = $_GET['op'];
$action = $_GET['action'];
$query = $_POST['query'];

// include("./config/db.inc.php");

// Подгружаем требуемый html-шаблон, возвращаем содержимое
function getTemplate($template) {
    ob_start();
    include ("./templates/".$template.".html."); // Отправляем в буфер содержимое файла
    $variables = ob_get_clean(); // Очищаем буфер и возвращаем содержимое
    return $variables; // Возвращение текста из файла
}

function main() {
    global $fyb, $db, $action, $query;

    $query = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$query);
    // подгружаем шаблон шапки сайта
    include_once("./templates/main.head.html");

    // подгружаем шаблон навигационной панели
    include_once("./templates/main.navbar.html");

    // подгружаем шаблон боковой панели
    include_once("./templates/main.container.sidebar.html");

    // подгружаем шаблон основного содержимого
    if (!$action || $action == '') {
        $sql = $db->query("SELECT * FROM * WHERE *");
        while ($row = $sql->fetch_assoc()) {
            $SUMMARY = $row["SUMMARY"];
            $TEXT = $row["TEXT"];
            $search_tpl_variables = str_replace(
                array(
                    "%SUMMARY%",
                    "%TEXT%"
                ),
                array(
                    $SUMMARY,
                    $TEXT
                ),
                getTemplate("main.container.search")
            );
            echo $search_tpl_variables;
        }
    }
    if ($query && $action == "search") {
        getTemplate("main.container.menu");
        echo $main_section_tpl_variables;
    }

    // подгржаем шаблон подвала сайта
    include_once ("./templates/main.footer.html");
}

switch($op) {
    default:
        main();
        break;
}