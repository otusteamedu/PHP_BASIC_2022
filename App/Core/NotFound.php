<?php

namespace App\Core;

class NotFound {

  public static function notFound($debug) {

    $data = parse_ini_file("../config/config.ini", true, INI_SCANNER_TYPED);
    $debug_enabled = $data['debug']['enabled'];

    if ($debug_enabled) {
      View::render('404', [
        'title' => 'Not found',
        'debug_info' => $debug,
      ]);
    } else {
      View::render('404', [
        'title' => 'Not found',
      ]);
    }
  }
}
