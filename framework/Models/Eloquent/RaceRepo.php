<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Doctrine\DBAL\Exception;
use Otus\Mvc\Core\View;

class RaceRepo extends Model
{
    public $timestamps = false;

    public static function create() {
        if(!empty($_POST['race_name']) && 
            //!empty($_POST['date_start']) &&
            !empty($_POST['race_venue']) &&
            !empty($_POST['race_description']) && 
            !empty($_POST['race_type_id'])) {
                $secure_race_name = htmlspecialchars($_POST['race_name']);
                $secure_race_venue = htmlspecialchars($_POST['race_venue']);
                $secure_race_description = htmlspecialchars($_POST['race_description']);
                $secure_race_type_id = htmlspecialchars($_POST['race_type_id']);
                $race = new Race();
                $race->race_name = $secure_race_name;
                $race->race_name = $secure_race_name;
                //$race->date_start = $_POST['date_start'];
                $race->race_description = $secure_race_description;
                $race->race_type_id = $secure_race_type_id;
                try {
                    if(!$race->save()) {
                        throw new Exception("Гонка не сохранилась в базе"); 
                    }
                } catch(\Exception $ex) {
                    MyLogger::log_db_error();
                    View::render('503',[]);  
                }
                return true; 
            } else {
                return false;
            }
    }

    public static function del() {
        $massif_races=[];
        $k=0;
        if(!empty($_GET['race_id'])) {
            $race_id = $_GET['race_id'];
            if(($race_del = Race::where('race_id', '=', $race_id)->delete()) == true) {
                foreach (Race::all() as $races) {
                    $massif_races[$k]=[
                        "race_id" => $races['race_id'],
                        "race_name" => $races['race_name']
                    ];
                    $k++;
                }
                return $massif_races; 
            } else {
                return false;
        }
    }

    }
}
