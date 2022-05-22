<?php
namespace Otus\Mvc\Models\OtusORM;

class Books extends Model {
    public function getBookSearch(){
        return [
            'title' => 'OTUS - книжный магазин',
            'value' => 'Показываем реузльтат поиска'
        ];
    }

    public function getBookView(){
        return [
            'title' => 'OTUS - книжный магазин',
            'value' => 'Показываем полный список книг'
        ];
    }
}
