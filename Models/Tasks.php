<?php

namespace Otus\Mvc\Models;

class Tasks extends Model
{
    protected static $table = 'tasks';
    protected static $states = [
        0 => 'новая',
        1 => 'в работе',
        2 => 'выполнена',
    ];

    public static function getStates($params = []): array
    {
        return self::$states;
    }
    
    public static function getAll($params = []): array
    {

        $where = '1 ';
        $parameters = [];
        if (isset($params['id']) && $params['id']){
            $where .= " AND ".self::$table.".id = ?";
            $parameters[] = $params['id'];
        }

        $sql = "SELECT ".self::$table.".*, u_author.fio as author_fio, u_contractor.fio as contractor_fio FROM ".self::$table." 
                LEFT JOIN atributes as u_author ON ".self::$table.".author = u_author.user_id
                LEFT JOIN atributes as u_contractor ON ".self::$table.".contractor = u_contractor.user_id
                where ".$where." ";
        $return = parent::getSQL($sql, $parameters);
        if ($return) return $return;
        return [];
    }





}
