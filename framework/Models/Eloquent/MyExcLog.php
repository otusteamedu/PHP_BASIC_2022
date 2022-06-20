<?php

namespace Otus\Mvc\Models\Eloquent;

use Psr\Log\LogLevel;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\IntrospectionProcessor;

class MyExcLog extends \Exception
{
    public $id;

    public function __construct($message = "", $code = 0, $previous = null, $id = 0)
    {
        parent::__construct($message,$code,$previous);
        $this->id = $id;
    }

    public static function myLog($ex)
    {
        $log = new Logger('task_log');
        $log->pushHandler(new StreamHandler('../log/task_log.log', LogLevel::ERROR));
        $log->error($ex);
    }

}