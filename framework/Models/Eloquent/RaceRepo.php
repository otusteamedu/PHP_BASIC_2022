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
            !empty($_POST['race_description']) && 
            !empty($_POST['race_participant_user_id']) && 
            !empty($_POST['race_type_id'])) {
                $secure_race_name = htmlspecialchars($_POST['race_name']);
                $secure_race_description = htmlspecialchars($_POST['race_description']);
                $secure_race_participant_user_id = htmlspecialchars($_POST['race_participant_user_id']);
                $secure_race_type_id = htmlspecialchars($_POST['race_type_id']);
                // Сделано специально, для того чтобы сделать свой отлов исключений!
                try {
                    $allowedExtensions = ['1','2'];
                    if(!in_array($secure_race_type_id, $allowedExtensions)) {
                        throw new MyExcLog($message="Вид спорта указан не верно", $id=15);
                    }
                } catch(MyExcLog $ex) {
                    $ex->getMessage();
                    $ex->id;
                    MyExcLog::myLog($ex);
                    View::render('400',[]);  
                }
                $race = new Race();
                $race->race_name = $secure_race_name;
                $race->race_description = $secure_race_description;
                $race->race_participant_user_id = $secure_race_participant_user_id;
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

}
