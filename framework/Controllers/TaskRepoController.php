<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\Database;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\TaskRepo as EloquentTaskRepo;
use Otus\Mvc\Models\OtusORM\Users as OtusORMUsers;
use Otus\Mvc\Models\Doctrine\User as DoctrineUser;
use PDO;
class TaskRepoController
{

    public function createdTask() {

        if(EloquentTaskRepo::create() == true) {
            View::render('tasknew',[
                        'title' => 'Новая задача создана',
                        'task_id' => 'Присваивается',
                        'task_name' => $_POST['task_name']
            ]);
        } else {
            View::render('404',[
                'title' => 'Неудача',
                'resault' => 'Извините, мы не смогли создать задачу... попробуйте еще раз'
            ]);
        }
    }

}


