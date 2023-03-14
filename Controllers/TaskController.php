<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Tasks\Service\TasksService;

class TaskController extends BaseController
{
    public function index() {

        View::render('info',[
            'title' => 'Заработало'
        ]);
    }

    public function list() {


        $list = TasksService::getListTasks([]);
echo "<pre>"; 
print_r($list); 
echo "</pre>";
        View::render('taskslist',[
            'list' => $list,
            'states' => TasksService::getStates()
        ]);
    }
}
