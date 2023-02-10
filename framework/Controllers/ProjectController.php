<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\Database;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\Project as EloquentProject;
use Otus\Mvc\Models\OtusORM\Users as OtusORMUsers;
use Otus\Mvc\Models\Doctrine\User as DoctrineUser;
use PDO;
class ProjectController
{
    public function allProjects() {
        $massi=[];
        $k=0;
        foreach (EloquentProject::all() as $project)  {
            $massi[$k]=[
                "project_id" => $project['project_id'],
                "project_name" => $project['project_name']
            ];
            $k++;
        }

        View::render('project',[
            'title' => 'Все проекты',
            'project_id' => $project->project_id,
            'project_name' => $project->project_name,
            'massi' => $massi
        ]);
    
    }


}
