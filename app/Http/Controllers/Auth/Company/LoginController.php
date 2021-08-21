<?php

namespace App\Http\Controllers\Auth\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::COMPANY_HOME;


    public function __construct()
    {
        $this->middleware('guest:company')->except('logout');
    }
    protected function guard()
    {
        return Auth::guard('company');
    }

    public function showLoginForm()
    {
        return view('auth.company.login');
    }
}
