<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::CUSTOMER_HOME;

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }
    protected function guard()
    {
        return Auth::guard('customer');
    }

    public function showLoginForm()
    {
        return view('auth.customer.login');
    }
}
