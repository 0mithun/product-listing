<?php

namespace App\Http\Controllers\Social;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectOnProviders($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        //return 111;
        $userSocial = Socialite::driver($provider)->user();

        $user = User::whereEmail($userSocial->getEmail())->first();
        if (!$user) {
            $user = User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'password' => bcrypt('password')
            ]);
        };

        Auth::guard('user')->login($user);
        return redirect()->route('user.dashboard');
    }
}
