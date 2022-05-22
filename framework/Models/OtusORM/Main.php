<?php
namespace Otus\Mvc\Models\OtusORM;

class Main extends Model {
    public function getAppInfo(){
        return [
            'title' => 'OTUS - книжный магазин',
            'appName' => 'Книжный Магазин'
        ];
    }
}