<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\Database;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\Project as EloquentProject;
use Otus\Mvc\Models\OtusORM\Users as OtusORMUsers;
use Otus\Mvc\Models\Doctrine\User as DoctrineUser;
use PDO;
class ProjectViewerController
{
    public function viewAllProjects() {

        $massif_projects = EloquentProject::allProjects();
        if($massif_projects !== null) {
        View::render('project',[
            'title' => 'Все проекты',
            'massif' => $massif_projects
        ]);
        } else {
            View::render('404',[
                'title' => 'Упссс',
                'resault' => 'Все сломалось....'
            ]);  
        }      
    }
    
}



