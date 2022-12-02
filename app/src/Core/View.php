<?php

namespace Otus\Mvc\Core;

class View
{
    static function render(string $view, array $data = []) {
        extract($data, EXTR_OVERWRITE);
        require_once "src/Views/{$view}.php";
        exit();
    }
}
