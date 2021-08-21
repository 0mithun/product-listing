<?php

namespace App\Http\Controllers\Auth\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\Comment\Entities\Reply;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::USER_HOME;


    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }
    protected function guard()
    {
        return Auth::guard('user');
    }

    public function showLoginForm()
    {
        return view('auth.user.login');
    }
}
