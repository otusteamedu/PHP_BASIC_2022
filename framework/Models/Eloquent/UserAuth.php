<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Otus\Mvc\Core\View;
use Doctrine\DBAL\Exception;
//use Otus\Mvc\Service\UserService;

class UserAuth extends Model
{
    public $timestamps = false;

    public static function login() {
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            try {
                    if((User::all()->first()) == null) {
                        throw new Exception("Таблица с пользователями не доступна");
                    }
                } catch (\Exception $e) {
                    MyLogger::log_db_error(); 
                    View::render('503',[]); 
                }

            if((User::where('name', '=', $_POST['username'])->first()) !== null) {
                foreach (User::where('name', '=', $_POST['username'])->get() as $user) {
                    $password = $_POST['password'];
                    if (password_verify($password,$user->password)){
                       //session_id('myIDSession01');
                       //session_start();
                        /*
                        try {
                            if (!session_id()) {
                                session_start();
                            } else {
                                throw new Exception("Не удалось создать сессию");
                            }
                        } catch(\Exception $ex) {
                            MyLogger::log_db_error();
                            View::render('503',[]);
                        }
                        */
                        $_SESSION['is_auth'] = true;
                        $_SESSION['username'] = $user->name;
                        $_SESSION['user_id'] = $user->id;
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
                
        }
    }

    public static function logout() {
        if (isset($_POST['logout'])) {
            try {
                if(!session_destroy()) {
                    throw new Exception("Ошибка окончания сессии"); 
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
/*


//отладка механизма логаута
    public static function logout() {
        if (isset($_POST['logout'])) {
            if (session_id()) {
                try {
                    if(!session_destroy()) {
                        throw new Exception("Ошибка окончания сессии"); 
                    }
                } catch(\Exception $ex) {
                    MyLogger::log_db_error();
                    View::render('503',[]);
                }
            }                
            return true;
        } else {
            return false;
        }
    }
*/

}
