<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Doctrine\DBAL\Exception;
use Otus\Mvc\Core\View;

class TaskViewer extends Model
{
    public $timestamps = false;

    public static function allTasks() {
        $massif_tasks=[];
        $k=0;
        try {
            if((User::all()->first()) == null) {
                throw new Exception("Таблица с задачами не доступна");
            }
        } catch (\Exception $e) {
            MyLogger::log_db_error(); 
            View::render('503',[
            ]); 
        }
        foreach (Task::all() as $tasks) {
            $massif_tasks[$k]=[
                "task_id" => $tasks['task_id'],
                "task_name" => $tasks['task_name']
            ];
            $k++;
        }
        return $massif_tasks; 
    } 

    public static function allTasksProject() {
        if(!empty($_GET['project_id'])) {
            $project_id = $_GET['project_id'];
            $massif_tasks=[];
            $k=0;
            try {
                foreach (Task::where('task_project_id', '=', $project_id)->get() as $tasks) {
                        $massif_tasks[$k]=[
                        "task_id" => $tasks['task_id'],
                        "task_name" => $tasks['task_name']
                        ];
                        $k++;
                    } 
                return $massif_tasks; 
            } catch (\Exception $e) {
                MyLogger::log_db_error(); 
                View::render('503',[
                ]); 
            }
        } 
            
    }
       
    public static function personalTasks() {
        if(!empty($_SESSION['user_id'])) {
            $user = $_SESSION['user_id'];
            $massif_tasks=[];
            $k=0;
            try {
                foreach (Task::where('task_responsibly_user_id', '=', $user)->get() as $tasks) {
                    $massif_tasks[$k]=[
                        "task_id" => $tasks['task_id'],
                        "task_name" => $tasks['task_name']
                    ];
                    $k++;
                }
            } catch (\Exception $e) {
                MyLogger::log_db_error(); 
                View::render('503',[
                ]); 
            }
            return $massif_tasks; 
        }
    }

    public static function infoTask() {
        if(!empty($_GET['task_id'])) {
            $task_id = $_GET['task_id'];
            try {
                if(!$massif_task_info = Task::where('task_id', '=', $task_id)->first()){
                    throw new Exception("Таблица с задачами не доступна");
                }
            } catch (\Exception $e) {
                MyLogger::log_db_error(); 
                View::render('503',[
                ]); 
            }
            return $massif_task_info;
        } else {
            return false;
        }
    }

}