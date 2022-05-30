<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;

    public static function allProjects() {
        $massif_projects=[];
        $k=0;
        foreach (Project::all() as $project) {
            $massif_projects[$k]=[
                "project_id" => $project['project_id'],
                "project_name" => $project['project_name']
            ];
            $k++;
        }
        return $massif_projects;
    }

}
