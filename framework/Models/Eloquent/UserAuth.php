<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class UserAuth extends Model
{
    public $timestamps = false;

    public static function login() {
        if(isset($_POST['username']))
        {
            $user_log = User::where('name', '=', $_POST['username'])->first();
        }
        if($user_log !== null) {
            foreach (User::where('name', '=', $_POST['username'])->get() as $user) {
                $password = $_POST['password'];
                if (password_verify($password,$user->password)){
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

    public static function logout() {
        if (isset($_POST['logout'])) {
            session_destroy();
            return true;
        } else {
            return false;
        }
    }

}
