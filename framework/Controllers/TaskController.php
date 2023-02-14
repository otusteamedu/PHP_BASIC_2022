<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\Database;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\Task as EloquentTask;
use Otus\Mvc\Models\OtusORM\Users as OtusORMUsers;
use Otus\Mvc\Models\Doctrine\User as DoctrineUser;
use PDO;
class TaskController
{
    public function allTask() {
        $massi=[];
        $k=0;
        foreach (EloquentTask::all() as $task)  {
            $massi[$k]=[
                "task_id" => $task['task_id'],
                "task_name" => $task['task_name']
            ];
            $k++;
        }

        View::render('task',[
            'title' => 'Все задачи',
            'task_id' => $task->task_id,
            'task_name' => $task->task_name,
            'massi' => $massi
        ]);
    
    }


    public function projectTasks() {
        $project_id = $_GET['project_id'];
        $massi=[];
        $k=0;
        foreach (EloquentTask::where('task_project_id', '=', $project_id)->get() as $task) {
            $massi[$k]=[
                "task_id" => $task['task_id'],
                "task_name" => $task['task_name']
            ];
            $k++;
        }
                    View::render('task',[
                        'title' => 'Задачи по проекту',
                        'task_id' => $task->task_id,
                        'task_name' => $task->task_name,
                        'massi' => $massi
                    ]);
    }

/*
    public function allTaskold() {

        foreach(EloquentTask::all() as $task) {
    
                View::render('task',[
                    'title' => 'Все задачи',
                    'task_id' => $task->task_id,
                    'task_name' => $task->task_name
                ]);
            }
        }
*/

    public function personalTasks() {

        $user = $_SESSION['user_id'];
        $massi=[];
        $k=0;
        foreach (EloquentTask::where('task_responsibly_user_id', '=', $user)->get() as $task) {
            $massi[$k]=[
                "task_id" => $task['task_id'],
                "task_name" => $task['task_name']
            ];
            $k++;
        }
                    View::render('task',[
                        'title' => 'Задачи пользователя',
                        'task_id' => $task->task_id,
                        'task_name' => $task->task_name,
                        'massi' => $massi
                    ]);
    }


    public function createdTasks() {

        $task = new EloquentTask();
        $task->task_name = $_POST['task_name'];
        $task->task_description = $_POST['task_description'];
        $task->task_responsibly_user_id = $_POST['task_responsibly_user_id'];
        $task->task_project_id = $_POST['task_project_id'];
        $task->save(); 
        
        View::render('tasknew',[
                    'title' => 'Новая задача создана',
                    'task_id' => 'Присваивается',
                    'task_name' => $task->task_name
                ]);
    }

    public function infoTask() {
        
        $task_id = $_GET['task_id'];
        $flight = EloquentTask::where('task_id', '=', $task_id)->first();
        View::render('taskinfo',[
            'title' => 'Информация по задаче',
            'task_id' => $flight['task_id'],
            'task_name' => $flight['task_name'],
            'task_description' => $flight['task_description']
        ]);
    }



}


