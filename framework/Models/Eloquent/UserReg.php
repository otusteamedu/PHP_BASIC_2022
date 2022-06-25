<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Otus\Mvc\Core\View;
use Doctrine\DBAL\Exception;

class UserReg extends Model
{
    public $timestamps = false;

    public static function register() 
    {
        if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['username'])) {
            $secure_login = htmlspecialchars($_POST['login']);
            $secure_password = htmlspecialchars($_POST['password']);
            $secure_username = htmlspecialchars($_POST['username']);
            if (!$user_reg = User::where('login', '=', $secure_login)->firstOrFail()) {
                if ($user_reg == null) {
                    $user = new User();
                    $hash_paswd = password_hash($secure_password, PASSWORD_BCRYPT);
                    $user->login = $secure_login;
                    $user->username = $secure_username;
                    $user->password = $hash_paswd;
                    try {
                        if (!$user->save()) {
                            throw new Exception("Пользователь не сохранился в базе"); 
                        } else {
                            $_SESSION['is_auth'] = true;
                            $_SESSION['login'] = $user->login;
                            $_SESSION['user_id'] = $user->id;
                            return true;
                        }
                    } catch (\Exception $ex) {
                        $ex="Пользователь не сохранился в базе. Ошибка на сервере, проверь базу";
                        MyLogger::log_db_error();
                        View::render('error',[
                            'title' => '503 - Service Unavailable',
                            'error_code' => '503 - Service Unavailable',
                            'result' => 'Cервер временно не имеет возможности обрабатывать запросы по техническим причинам'
                        ]);
                    }
                }
            }
        } else {
            return false;
        }
    }
}
    

