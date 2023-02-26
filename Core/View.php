<?php

namespace Otus\Mvc\Core;

class View
{
    static function render(string $view, array $data = []) {
        $contentView = implode(DIRECTORY_SEPARATOR, [$_SERVER['DOCUMENT_ROOT'], 'Views', "$view.php"]);
        if (file_exists($contentView)){
            extract($data, EXTR_OVERWRITE);
            require_once implode(DIRECTORY_SEPARATOR, [$_SERVER['DOCUMENT_ROOT'], 'Views', "main_view.php"]);
        } else {
            require_once implode(DIRECTORY_SEPARATOR, [$_SERVER['DOCUMENT_ROOT'], 'Views', "404.php"]);
        }
    }
}
