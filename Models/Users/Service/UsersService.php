<?php

namespace Otus\Mvc\Models\Users\Service;
use Otus\Mvc\Models\Users\Repository\UsersRepository;

class UsersService
{
    
    public static function getListUsers($params = []): array
    {
        return UsersRepository::getAll($params);
    }

    public static function getUserByToken(string $token): array
    {
        return UsersRepository::getByToken($params);
    }

    public static function loginUserByToken(): array
    {
        return UsersRepository::loginByToken();
    }

    public static function loginUser(string $login, string $pswd): array
    {
        return UsersRepository::login($login, $pswd);
    }

}
