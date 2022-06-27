<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Doctrine\DBAL\Exception;
use Otus\Mvc\Core\View;

class TaskRepo extends Model
{
    public $timestamps = false;

    public static function create() {
        if(!empty($_POST['task_name']) && !empty($_POST['task_description']) && !empty($_POST['task_responsibly_user_id']) && !empty($_POST['task_project_id'])) {
            $task = new Task();
            $task->task_name = $_POST['task_name'];
            $task->task_description = $_POST['task_description'];
            $task->task_responsibly_user_id = $_POST['task_responsibly_user_id'];
            $task->task_project_id = $_POST['task_project_id'];
            try {
                if(!$task->save()) {
                    throw new Exception("Задача не сохранилась в базе"); 
                }
            } catch(\Exception $ex) {
                MyLogger::log_db_error();
                View::render('503',[]);  
            }
            return true; 
        } else {
            return false;
        }
    }

}
