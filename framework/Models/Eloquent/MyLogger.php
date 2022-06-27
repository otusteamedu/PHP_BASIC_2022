<?php

namespace Otus\Mvc\Models\Eloquent;

use Psr\Log\LogLevel;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MyLogger
{
    public static function log_user_auth() {
        $log = new Logger('users_log');
        $log->pushHandler(new StreamHandler('log/user_event.log', LogLevel::ERROR));
        $log->error('Ошибка входа в систему пользователем '.''.$_POST['username']);
    }

    public static function log_user_reg() {
        $log = new Logger('users_log');
        $log->pushHandler(new StreamHandler('log/user_event.log', LogLevel::ERROR));
        $log->error('Пользователь не смог зарегистрироваться');
    }


    public static function log_task_created() {
        $log = new Logger('task_log');
        $log->pushHandler(new StreamHandler('log/task_event.log', LogLevel::ERROR));
        $log->error('Ошибка при создании задачи! Пользователь ошибся!');
    }

    public static function log_db_error() {
        $log = new Logger('db_log');
        $log->pushHandler(new StreamHandler('log/db_error.log', LogLevel::ERROR));
        $log->error('ошибка в базе данных');
    }

}