<?php declare(strict_types=1);


namespace App\Contracts;


use SocialiteProviders\Manager\OAuth2\User;

interface SocialServiceContract
{
    public function login(User $user);

//    public function loginFB(User $user);
}
