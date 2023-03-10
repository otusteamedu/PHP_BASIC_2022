<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Tasks;

class TaskController extends BaseController
{
    public function index() {

        View::render('info',[
            'title' => 'Заработало'
        ]);
    }

    public function list() {


        $list = Tasks::getAll([]);
echo "<pre>"; 
print_r($list); 
echo "</pre>";
        View::render('taskslist',[
            'list' => $list,
            'states' => Tasks::getStates()
        ]);
    }
}
