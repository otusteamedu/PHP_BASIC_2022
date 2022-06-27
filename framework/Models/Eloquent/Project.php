<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Otus\Mvc\Core\View;

class Project extends Model
{
    public $timestamps = false;

    public static function allProjects() {
        $massif_projects=[];
        $k=0;
        try {
            foreach (Project::all() as $project) {
                $massif_projects[$k]=[
                    "project_id" => $project['project_id'],
                    "project_name" => $project['project_name']
                ];
                $k++;
            }
        } catch (\Exception $e) {
            MyLogger::log_db_error(); 
            View::render('503',[
            ]); 
        }

        return $massif_projects;
    }

}

