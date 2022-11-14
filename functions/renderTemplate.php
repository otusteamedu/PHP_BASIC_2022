<?php
function renderTemplate($pathTemp, $rows = [])
{
    $template = file_get_contents($pathTemp);

    foreach ($rows as $name => $value) {
        $template = str_replace("$name", $value, $template);
    }

    return $template;
}
