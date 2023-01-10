<?php

namespace Hw\Env;

class View {
  static function render(string $view, array $data = []) {
    extract($data, EXTR_OVERWRITE);
    require_once implode(DIRECTORY_SEPARATOR, [__DIR__, '/Views', "$view.php"]);
  }
}
