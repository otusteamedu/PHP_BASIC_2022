<?php

namespace Otus\Mvc\Services;

use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\RaceViewer as EloquentRaceViewer;
use Otus\Mvc\Models\Eloquent\RaceRepo as EloquentRaceRepo;


class RaceService
{
    public static function allRacesServ()
    {
        $massif_races = EloquentRaceViewer::allRaces();
        if($massif_races !== null) {
            View::render('race',[
                'title' => 'Все гонки',
                'massif_races' => $massif_races
            ]);
        }        
    }

    public static function allRacesTypeServ()
    {
        $massif_races = EloquentRaceViewer::allRacesType();
        if($massif_races !== null) {
            View::render('race',[
                'title' => 'Гонки по виду спорта',
                'massif_races' => $massif_races
            ]);
        }  
    }

    public static function personalRacesServ()
    {
        $massif_races = EloquentRaceViewer::personalRaces();
        if($massif_races !== null) {
            View::render('racepers',[
                'title' => 'Ваши гонки',
                'massif_races' => $massif_races
            ]);
        }  else {
            View::render('error',[
                'title' => '503 - Service Unavailable',
                'error_code' => '503 - Service Unavailable',
                'result' => 'Cервер временно не имеет возможности обрабатывать запросы по техническим причинам'
            ]);
        }
    }

    public static function infoRaceServ()
    {
        $massif_race_info = EloquentRaceViewer::infoRace();
        if($massif_race_info !== null) {
            View::render('raceinfo',[
                'title' => 'Информация по гонке',
                'race_id' => $massif_race_info['race_id'],
                'race_name' => $massif_race_info['race_name'],
                'race_description' => $massif_race_info['race_description'],
                'race_date_start' => $massif_race_info['race_date_start'],
                'race_date_finish' => $massif_race_info['race_date_finish'],
                'race_place' => $massif_race_info['race_place'],
                'race_logo' => $massif_race_info['race_logo']
            ]);
        }     
    }

    public static function createdRaceServ()
    {

        if(EloquentRaceRepo::create()) {
            View::render('racenew',[
                        'title' => 'Новая гонка создана',
                        'race_id' => 'Присваивается',
                        'race_name' => $_POST['race_name']
            ]);
        } else {
            View::render('error',[
                'title' => '400 - Bad request',
                'error_code' => '400 - Bad request',
                'result' => 'Извините, мы не смогли создать гонку... попробуйте еще раз заполнить поля'
            ]);
        }
    }

    public static function delRaceServ()
    {

        if(EloquentRaceRepo::del()) {
            $massif_races = EloquentRaceViewer::allRaces();
            if($massif_races !== null) {
                View::render('race',[
                    'title' => 'Все гонки',
                    'massif_races' => $massif_races
                ]);
            }    
        } else {
            View::render('error',[
                'title' => 'Неудача',
                'result' => 'Извините, мы не смогли удалить гонку... попробуйте еще раз'
            ]);
        }
    }
    
}