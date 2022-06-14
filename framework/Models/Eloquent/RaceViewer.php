<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Doctrine\DBAL\Exception;
use Otus\Mvc\Core\View;

class RaceViewer extends Model
{
    public $timestamps = false;

    public static function allRaces() {
        $massif_races=[];
        $k=0;
        try {
            if((Race::all()->first()) == null) {
                throw new Exception("Таблица с гонками не доступна");
            }
        } catch (\Exception $e) {
            MyLogger::log_db_error(); 
            View::render('503',[
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

    public static function allRacesType() {
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
                View::render('503',[
                ]); 
            }
        } 
            
    }
       
    public static function personalRaces() {
        if(!empty($_SESSION['user_id'])) {
            $user = $_SESSION['user_id'];
            $massif_races=[];
            $k=0;
            try {
                foreach (Race::where('race_participant_user_id', '=', $user)->get() as $races) {
                    $massif_races[$k]=[
                        "race_id" => $races['race_id'],
                        "race_name" => $races['race_name']
                    ];
                    $k++;
                }
            } catch (\Exception $e) {
                MyLogger::log_db_error(); 
                View::render('503',[
                ]); 
            }
            return $massif_races; 
        } else {
            var_dump($_SESSION['user_id']);
        }
    }

    public static function infoRace() {
        if(!empty($_GET['race_id'])) {
            $race_id = $_GET['race_id'];
            try {
                if(!$massif_race_info = Race::where('race_id', '=', $race_id)->first()){
                    throw new Exception("Таблица с гонками не доступна");
                }
            } catch (\Exception $e) {
                MyLogger::log_db_error(); 
                View::render('503',[
                ]); 
            }
            return $massif_race_info;
        } else {
            return false;
        }
    }

}