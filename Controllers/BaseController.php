<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

class BaseController
{
    public static $user = [];
    public static $isLogined = false;

    public function setUser($user) {
        if ($user) {
            $this->user = $user;
            $this->isLogined = true;
        }
    }

}
