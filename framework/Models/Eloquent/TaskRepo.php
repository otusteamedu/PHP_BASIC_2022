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
            $secure_task_name = htmlspecialchars($_POST['task_name']);
            $secure_task_description = htmlspecialchars($_POST['task_description']);
            $secure_task_responsibly_user_id = htmlspecialchars($_POST['task_responsibly_user_id']);
            $secure_task_project_id = htmlspecialchars($_POST['task_project_id']);
            // Сделано специально, для того чтобы сделать свой отлов исключений!
            try {
                $allowedExtensions = ['1','2'];
                if(!in_array($secure_task_project_id, $allowedExtensions)) {
                    throw new MyExcLog($message="Проект указан не верно", $id=15);
                }
            } catch(MyExcLog $ex) {
                $ex->getMessage();
                $ex->id;
                MyExcLog::myLog($ex);
                View::render('400',[]);  
            }
            $task = new Task();
            $task->task_name = $secure_task_name;
            $task->task_description = $secure_task_description;
            $task->task_responsibly_user_id = $secure_task_responsibly_user_id;
            $task->task_project_id = $secure_task_project_id;
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
