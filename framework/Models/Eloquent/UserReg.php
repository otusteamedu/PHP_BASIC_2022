<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Otus\Mvc\Core\View;
use Doctrine\DBAL\Exception;

class UserReg extends Model
{
    public $timestamps = false;

    public static function register() {
        
        if(!empty($_POST['username']) || !empty($_POST['password'])) {
            $secure_username = htmlspecialchars($_POST['username']);
            $secure_password = htmlspecialchars($_POST['password']);
            if(!$user_reg = User::where('name', '=', $secure_username)->first()){
                if($user_reg == null) {
                    $user = new User();
                    $hash_paswd = password_hash($secure_password, PASSWORD_BCRYPT);
                    $user->name = $secure_username;
                    $user->password = $hash_paswd;
                    try{
                        if(!$user->save()) {
                            throw new Exception("Пользователь не сохранился в базе"); 
                        }
                    }catch(\Exception $ex) {
                        MyLogger::log_db_error();
                        View::render('503',[]);  
                    }
                    $_SESSION['is_auth'] = true;
                    $_SESSION['username'] = $user->name;
                    $_SESSION['user_id'] = $user->id;
                    return true;
                } 
            }
        } else {
            return false;
        }
    }
}
    

