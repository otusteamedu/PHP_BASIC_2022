<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Services\ProjectService;

class ProjectViewerController
{
    public function viewAllProjects() {
        ProjectService::viewAllProjectsServ();   
    }

    
}



