<?php

namespace Otus\Mvc\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class UserReg extends Model
{
    public $timestamps = false;

    public static function register() {

        if(isset($_POST['username']))
        {
            $user_reg = User::where('name', '=', $_POST['username'])->first();
            if($user_reg == null) {
                $user = new User();
                $hash_paswd = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $user->name = $_POST['username'];
                $user->password = $hash_paswd;
                $user->save();

            } else {
                return false;
            }
        }
        $_SESSION['is_auth'] = true;
        $_SESSION['username'] = $user->name;
        $_SESSION['user_id'] = $user->id;
        return true;
    }

}
