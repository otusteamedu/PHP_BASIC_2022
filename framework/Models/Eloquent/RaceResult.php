<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Otus\Mvc\Core\View;
use Doctrine\DBAL\Exception;

class RaceResult extends Model
{
    public static function allRaceResults()
    {
        $massif_race_results=[];
        $k=0;
        try {
            foreach (RaceResult::all() as $raceresults) {
                $massif_race_results[$k]=[
                    "race_id" => $raceresults['race_id'],
                    "user_id" => $raceresults['user_id'],
                    "user_final_result" => $raceresults['user_final_result'],
                    "user_number" => $raceresults['user_number']
                ];
                $k++;
            }
        } catch (\Exception $e) {
            MyLogger::log_db_error();
            View::render('error',[
                'title' => '503 - Service Unavailable',
                'error_code' => '503 - Service Unavailable',
                'result' => 'Cервер временно не имеет возможности обрабатывать запросы по техническим причинам'
            ]);
        }
        return $massif_race_results;
    }

}

    

