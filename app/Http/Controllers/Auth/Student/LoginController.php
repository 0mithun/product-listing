<?php

namespace App\Http\Controllers\Auth\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\Comment\Entities\Reply;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::STUDENT_HOME;


    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }
    protected function guard()
    {
        return Auth::guard('student');
    }

    public function showLoginForm()
    {
        return view('auth.student.login');
    }
}
