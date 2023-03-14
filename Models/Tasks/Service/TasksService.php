<?php

namespace Otus\Mvc\Models\Tasks\Service;
use Otus\Mvc\Models\Tasks\Repository\TasksRepository;

class TasksService
{
    protected static $states = [
        0 => 'новая',
        1 => 'в работе',
        2 => 'выполнена',
    ];

    public static function getStates($params = []): array
    {
        return self::$states;
    }
    
    public static function getListTasks($params = []): array
    {
        return TasksRepository::getAll($params);
    }





}
