<?php declare(strict_types=1);


namespace App\Services;

use \App\Models\User as Model;
use App\Contracts\SocialServiceContract;
use Laravel\Socialite\Contracts\User;


class SocialService implements SocialServiceContract
{

    /**
     * @param User $user
     * @return string
     */
    public function login(User $user): ?string
    {

        $userData = Model::where('email', $user->getEmail())->firstOrFail();
        $userData->name = $user->getName();
        $userData->avatar = $user->getAvatar();

        if ($userData->save())
        {
           \Auth::loginUsingId($userData->id);
        }
        return route('login');
    }
}
