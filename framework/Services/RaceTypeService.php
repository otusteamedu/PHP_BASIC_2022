<?php

namespace Otus\Mvc\Services;

use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\RaceType as EloquentRaceType;


class RaceTypeService
{
    public static function viewAllRaceTypeServ()
    {
        $massif_racetypes = EloquentRaceType::allRaceTypes();
        if($massif_racetypes !== null) {
            View::render('racetype',[
                'title' => 'Все категории',
                'massif' => $massif_racetypes
            ]);
        }  else {
            View::render('error',[
                'title' => '503 - Service Unavailable',
                'error_code' => '503 - Service Unavailable',
                'result' => 'Cервер временно не имеет возможности обрабатывать запросы по техническим причинам'
            ]);
        }
    }
    
}