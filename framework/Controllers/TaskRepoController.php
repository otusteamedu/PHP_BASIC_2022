<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Services\TaskService;

class TaskRepoController
{
    public function createdTask() {
        TaskService::createdTaskServ();   
    }


}


