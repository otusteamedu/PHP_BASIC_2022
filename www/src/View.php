<?php

namespace Hw\Env;

class View {
  static function render(string $view, array $data = []) {
    extract($data, EXTR_OVERWRITE);
    require_once implode('/', [$_SERVER['DOCUMENT_ROOT'], 'src/Views', "$view.php"]);
  }
}
