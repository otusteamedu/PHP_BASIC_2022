<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Otus\Mvc\Core\View;

class RaceType extends Model
{
    public $timestamps = false;

    public static function allRaceTypes() {
        $massif_racetypes=[];
        $k=0;
        try {
            foreach (RaceType::all() as $racetypes) {
                $massif_racetypes[$k]=[
                    "type_id" => $racetypes['type_id'],
                    "type_name" => $racetypes['type_name']
                ];
                $k++;
            }
        } catch (\Exception $e) {
            MyLogger::log_db_error(); 
            View::render('503',[
            ]); 
        }
        return $massif_racetypes;
    }

}

