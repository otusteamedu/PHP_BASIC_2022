<?php

namespace Otus\Mvc\Models\Tasks\Repository;
use Otus\Mvc\Models\Model;

class TasksRepository extends Model
{
    protected static $table = 'tasks';
    
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
