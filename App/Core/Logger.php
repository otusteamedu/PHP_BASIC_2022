<?php

namespace App\Core;

use Monolog\Handler\StreamHandler;
use Monolog\Logger as MonologLogger;
use Psr\Log\LogLevel;

class Logger {

  private static $logger;
  public static function getLogger() {

    if (self::$logger == null) {

      self::$logger = new MonologLogger('monolog_otus_project');
      self::$logger->pushHandler(new StreamHandler('../log/app.log', LogLevel::DEBUG));
    }
    return self::$logger;
  }
}
