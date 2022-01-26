<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SocialSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class SocialLoginController extends Controller
{
    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function callback($service)
    {
        try {
            $serviceUser = Socialite::driver($service)->user();

            $user = User::where('email', '=', $serviceUser->email)->first();
            if (!$user) {
                $newUser = User::create([
                    'name'        => $serviceUser->name,
                    'email'       => $serviceUser->email,
                    'email_verified_at'       => now(),
                    'password'    => Hash::make('password'),
                    'image' => $serviceUser->avatar,
                    'auth_type'   => $service,
                ]);
            } else {
                if ($user->auth_type != $service) {
                    if ($user->auth_type == 'email') {
                        $message = 'This email is already associated with an account, pelase reset your password or login with your email and password below.';
                    } else {
                        $message = 'This email has already registered using ' . $user->auth_type . '. Please login with ' . ucfirst($user->auth_type);
                    }

                    return redirect()->route('login')->with('error', $message);
                }
            }

            Auth::guard('user')->login($user);

            return redirect('/');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error',  'Unable to login using ' . $service . '. Please try again');
        }
    }


}
