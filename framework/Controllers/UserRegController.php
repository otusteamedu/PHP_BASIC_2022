<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Services\UserService;

class UserRegController
{
    public function userReg() {
        UserService::userRegServ();
    }
  
}
