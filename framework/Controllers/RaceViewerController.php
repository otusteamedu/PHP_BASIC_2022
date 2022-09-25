<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Services\RaceService;
use Otus\Mvc\Core\View;

class RaceViewerController
{
    public function allRaces()
    {
        RaceService::allRacesServ();   
    }

    public function allRacesType()
    {
        RaceService::allRacesTypeServ();   
    }
    
    public function personalRaces()
    {
        RaceService::personalRacesServ();   
    }

    public function infoRace()
    {
        RaceService::infoRaceServ();   
    }

    public function createRace(): View
    {

        View::render('raceCre',[
            'title' => 'Главная страница',
            'name' => 'Anonymous user',
        ]);
    }

}



    








