<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\Database;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\TaskViewer as EloquentTaskViewer;
use Otus\Mvc\Models\OtusORM\Users as OtusORMUsers;
use Otus\Mvc\Models\Doctrine\User as DoctrineUser;
use PDO;
class TaskViewerController
{

    public function allTasks() {
        $massif_tasks = EloquentTaskViewer::allTasks();
        if($massif_tasks !== null) {
            View::render('task',[
                'title' => 'Все задачи',
                'massif_tasks' => $massif_tasks
            ]);
        } else {
            View::render('404',[
               'title' => 'Упссс',
               'resault' => 'Все сломалось....'
            ]);  
        }        
    }

    public function allTasksProject() {
        $massif_tasks = EloquentTaskViewer::allTasksProject();
        if($massif_tasks !== null) {
            View::render('task',[
                'title' => 'Задачи по проекту',
                'massif_tasks' => $massif_tasks
            ]);
        } else {
            View::render('404',[
                'title' => 'Упссс',
                'resault' => 'Все сломалось....'
            ]);  
        }        
    }

    public function personalTasks() {
        $massif_tasks = EloquentTaskViewer::personalTasks();
        if($massif_tasks !== null) {
            View::render('task',[
                'title' => 'Задачи пользователя',
                'massif_tasks' => $massif_tasks
            ]);
        } else {
            View::render('404',[
                'title' => 'Упссс',
                'resault' => 'Все сломалось....'
            ]);  
        }        
    }

    public function infoTask() {
        $massif_task_info = EloquentTaskViewer::infoTask();
        if($massif_task_info !== null) {
            View::render('taskinfo',[
                'title' => 'Информация по задаче',
                'task_id' => $massif_task_info['task_id'],
                'task_name' => $massif_task_info['task_name'],
                'task_description' => $massif_task_info['task_description']
            ]);
        } else {
            View::render('404',[
                'title' => 'Упссс',
                'resault' => 'Все сломалось....'
            ]);  
        }        
    }

}



    








