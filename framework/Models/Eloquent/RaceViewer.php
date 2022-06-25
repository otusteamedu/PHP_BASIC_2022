<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Doctrine\DBAL\Exception;
use Otus\Mvc\Core\View;

class RaceViewer extends Model
{
    public $timestamps = false;

    public static function allRaces() 
    {
        $massif_races=[];
        $k=0;
        try {
            if((Race::all()->first()) == null) {
                throw new Exception("Таблица с гонками не доступна");
            }
        } catch (\Exception $e) {
            MyLogger::log_db_error();
            View::render('error',[
                'title' => '503 - Service Unavailable',
                'error_code' => '503 - Service Unavailable',
                'result' => 'Cервер временно не имеет возможности обрабатывать запросы по техническим причинам'
            ]);
        }
        foreach (Race::all() as $races) {
            $massif_races[$k]=[
                "race_id" => $races['race_id'],
                "race_name" => $races['race_name']
            ];
            $k++;
        }
        return $massif_races; 
    } 

    public static function allRacesType() 
    {
        if(!empty($_GET['racetype_id'])) {
            $racetype_id = $_GET['racetype_id'];
            $massif_races=[];
            $k=0;
            try {
                foreach (Race::where('race_type_id', '=', $racetype_id)->get() as $races) {
                        $massif_races[$k]=[
                        "race_id" => $races['race_id'],
                        "race_name" => $races['race_name']
                        ];
                        $k++;
                    } 
                return $massif_races; 
            } catch (\Exception $e) {
                MyLogger::log_db_error();
                View::render('error',[
                    'title' => '503 - Service Unavailable',
                    'error_code' => '503 - Service Unavailable',
                    'result' => 'Cервер временно не имеет возможности обрабатывать запросы по техническим причинам'
                ]);
            }
        } 
            
    }
       
    public static function personalRaces() 
    {
        if(!empty($_SESSION['user_id'])) {
            $user = $_SESSION['user_id'];
            $massif_race_result=[];
            $k=0;
            try {
                foreach (RaceResult::where('user_id', '=', $user)->get() as $race_result) {
                    $massif_race_result[$k]=[
                        "race_id" => $race_result['race_id'],
                        "user_id" => $race_result['user_id'],
                        "user_final_result" => $race_result['user_final_result'],
                        "user_number" => $race_result['user_number']
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
            return $massif_race_result;
        } 
    }

    public static function infoRace() 
    {
        if(!empty($_GET['race_id'])) {
            $race_id = $_GET['race_id'];
            try {
                if(!$massif_race_info = Race::where('race_id', '=', $race_id)->first()){
                    throw new Exception("Таблица с гонками не доступна");
                }
            } catch (\Exception $e) {
                MyLogger::log_db_error();
                View::render('error',[
                    'title' => '503 - Service Unavailable',
                    'error_code' => '503 - Service Unavailable',
                    'result' => 'Cервер временно не имеет возможности обрабатывать запросы по техническим причинам'
                ]);
            }
            return $massif_race_info;
        } else {
            return false;
        }
    }

}