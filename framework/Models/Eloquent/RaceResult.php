<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Otus\Mvc\Core\View;
use Doctrine\DBAL\Exception;
use Illuminate\Database\Capsule\Manager as DB;

class RaceResult extends Model
{
    public static function allRaceResults()
    {
        if (!empty($_GET['race_id'])) {
            $race_id = $_GET['race_id'];
            $massif_race_results = [];
            $k = 0;
            try {
                foreach (DB::table('users')
                             ->join('race_results', 'users.user_id', '=', 'race_results.user_id')
                             ->join('races', 'race_results.race_id', '=', 'races.race_id')
                             ->where('races.race_id', '=', $race_id)
                             ->select('race_results.user_final_result', 'users.username')
                             ->orderBy('race_results.user_final_result', 'asc')
                             ->get() as $race_result) {
                    $race_result_array = json_decode(json_encode($race_result));
                    $array = json_decode(json_encode($race_result_array), true);

                    $massif_race_results[$k]=[
                        "user_final_result" => $array['user_final_result'],
                        "username" => $array['username']
                    ];
                    $k++;
                }
                    return $massif_race_results;
                } catch (\Exception $e) {
                    MyLogger::log_db_error();
                    View::render('error', [
                        'title' => '503 - Service Unavailable',
                        'error_code' => '503 - Service Unavailable',
                        'result' => 'Cервер временно не имеет возможности обрабатывать запросы по техническим причинам'
                    ]);
                }

        }
    }
}


