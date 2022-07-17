<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Services\TaskService;

class TaskViewerController
{
    public function allTasks() {
        TaskService::allTasksServ();   
    }

    public function allTasksProject() {
        TaskService::allTasksProjectServ();   
    }
    
    public function personalTasks() {
        TaskService::personalTasksServ();   
    }

    public function infoTask() {
        TaskService::infoTaskServ();   
    }

}



    








