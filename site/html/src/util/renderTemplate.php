<?php

/**
 * Произвести по списку подстановку реальных значений переменных в заданном шаблоне.
 *
 * @param $pathToTemplate путь к файлу шаблона (учитывается также include_path).
 * @param $vars ассоциативный массив соответствий имён переменных шаблона их реальным значениям.
 *
 * @return HTML-код шаблона с подставленными значениями.
 */
function renderTemplate(string $pathToTemplate, array $vars = []): string
{
    $template = file_get_contents($pathToTemplate, true);

    foreach ($vars as $name => $value) {
        $template = str_replace("{{{$name}}}", $value, $template);
    }

    return $template;
}
