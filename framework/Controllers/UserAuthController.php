<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Services\UserService;


class UserAuthController
{
    public function loginUser()
    {
        UserService::userLoginServ();
    }

    public function logoutUser()
    {
        UserService::userLogoutServ();
    }
    
}
