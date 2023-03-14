<?php

namespace Otus\Mvc\Models\Users\Repository;
use Otus\Mvc\Models\Model;

class UsersRepository extends Model
{
    protected static $table = 'users';

    public static function getAll($params = []): array
    {

        $where = '1 ';
        $parameters = [];
        if (isset($params['id']) && $params['id']){
            $where .= " AND ".self::$table.".id = ?";
            $parameters[] = $params['id'];
        }

        $sql = "SELECT * FROM ".self::$table." 
                LEFT JOIN atributes ON atributes.user_id = users.id
                where ".$where." ";

        return parent::getSQL($sql, $parameters);
    }

    public static function getByToken(string $token): array
    {

        $parameters = [$token];
        $sql = "SELECT * FROM ".self::$table." 
                where users.token = ? ";

        return parent::getSQL($sql, $parameters);
    }

    public static function loginByToken(): array
    {
        if (!empty($_SESSION['token'])){
            $user = self::getByToken($_SESSION['token']);
            if ($user[0]){
                return $user[0];
            }
        }
        return [];
    }


    public static function login(string $login, string $pswd): array
    {
        if ($login && $pswd){

            $parameters = [$login, $pswd];
            $sql = "SELECT * FROM ".self::$table." 
                where ".self::$table.".login = ? AND ".self::$table.".password = ? ";
            $user = parent::getSQL($sql, $parameters);
            if ($user[0]){
                $_SESSION['token'] = self::setToken($user[0]['id']);
                return $user[0];
            }
        }
        return [];
    }

    private static function setToken(int $user_id): string
    {
        $token = uniqid(); 
        $parameters = [$token, $user_id];
        $sql = "UPDATE ".self::$table."
            SET token = ?
            WHERE id = ?
            LIMIT 1
            ";
        parent::getSQL($sql, $parameters);
        return $token;
    }


}
