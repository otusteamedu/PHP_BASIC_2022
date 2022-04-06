<?php

$op = $_GET['op'];

// include("./config/db.inc.php");

// Подгружаем требуемый html-шаблон, возвращаем содержимое
function getTemplate($template) {
    ob_start();
    include ("./templates/".$template.".html."); // Отправляем в буфер содержимое файла
    $variables = ob_get_clean(); // Очищаем буфер и возвращаем содержимое
    return $variables; // Возвращение текста из файла
}

function main() {
    global $fyb, $db;
    // подгружаем шаблон шапки сайта
    include_once("./templates/main.head.html");

    // подгружаем шаблон навигационной панели
    include_once("./templates/main.navbar.html");

    // подгружаем шаблон боковой панели
    include_once("./templates/main.container.sidebar.html");

    // подгружаем шаблон основного содержимого
    $sql = $db->query("SELECT * FROM * WHERE *");
    while ($row = $sql->fetch_assoc()) {
        $SUMMARY = $row["SUMMARY"];
        $TEXT = $row["TEXT"];
        $main_section_tpl_variables = str_replace(
            array(
                "%SUMMARY%",
                "%TEXT%"
            ),
            array(
                $SUMMARY,
                $TEXT
            ),
            getTemplate("main.container.menu")
        );
        echo $main_section_tpl_variables;
    }

        // подгржаем шаблон подвала сайта
    include("./templates/main.footer.html");
}

switch($op) {
    default:
        main();
        break;
}