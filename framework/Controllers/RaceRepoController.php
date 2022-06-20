<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Services\RaceService;

class RaceRepoController
{
    public function createdRace()
    {
        RaceService::createdRaceServ();   
    }

    public function delRace()
    {
        RaceService::delRaceServ();   
    }


}


