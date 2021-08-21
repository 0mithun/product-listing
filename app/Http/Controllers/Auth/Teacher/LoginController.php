<?php

namespace App\Http\Controllers\Auth\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\Comment\Entities\Reply;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::TEACHER_HOME;


    public function __construct()
    {
        $this->middleware('guest:teacher')->except('logout');
    }
    protected function guard()
    {
        return Auth::guard('teacher');
    }

    public function showLoginForm()
    {
        return view('auth.teacher.login');
    }
}
