<?php

namespace Otus\Mvc\Services;

use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\Project as EloquentProject;


class ProjectService
{
    public static function viewAllProjectsServ() {

        $massif_projects = EloquentProject::allProjects();
        if($massif_projects !== null) {
            View::render('project',[
                'title' => 'Все проекты',
                'massif' => $massif_projects
            ]);
        }      
    }
    
}