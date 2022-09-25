<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Services\RaceTypeService;

class RaceTypeViewerController
{
    public function viewAllRaceTypes()
    {
        RaceTypeService::viewAllRaceTypeServ();   
    }

    
}



