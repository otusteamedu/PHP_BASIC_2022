<?php

namespace Otus\Mvc\Services;

use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\TaskViewer as EloquentTaskViewer;
use Otus\Mvc\Models\Eloquent\TaskRepo as EloquentTaskRepo;


class TaskService
{
    public static function allTasksServ() {
        $massif_tasks = EloquentTaskViewer::allTasks();
        if($massif_tasks !== null) {
            View::render('task',[
                'title' => 'Все задачи',
                'massif_tasks' => $massif_tasks
            ]);
        }        
    }

    public static function allTasksProjectServ() {
        $massif_tasks = EloquentTaskViewer::allTasksProject();
        if($massif_tasks !== null) {
            View::render('task',[
                'title' => 'Задачи по проекту',
                'massif_tasks' => $massif_tasks
            ]);
        }  
    }

    public static function personalTasksServ() {
        $massif_tasks = EloquentTaskViewer::personalTasks();
        if($massif_tasks !== null) {
            View::render('task',[
                'title' => 'Задачи пользователя',
                'massif_tasks' => $massif_tasks
            ]);
        }   
    }

    public static function infoTaskServ() {
        $massif_task_info = EloquentTaskViewer::infoTask();
        if($massif_task_info !== null) {
            View::render('taskinfo',[
                'title' => 'Информация по задаче',
                'task_id' => $massif_task_info['task_id'],
                'task_name' => $massif_task_info['task_name'],
                'task_description' => $massif_task_info['task_description']
            ]);
        }     
    }

    public static function createdTaskServ() {

        if(EloquentTaskRepo::create() == true) {
            View::render('tasknew',[
                        'title' => 'Новая задача создана',
                        'task_id' => 'Присваивается',
                        'task_name' => $_POST['task_name']
                        //'task_name' => Task::task_name
            ]);
        } else {
            View::render('404',[
                'title' => 'Неудача',
                'resault' => 'Извините, мы не смогли создать задачу... попробуйте еще раз заполнить поля'
            ]);
        }
    }
    
}