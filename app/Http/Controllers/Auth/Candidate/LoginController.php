<?php

namespace App\Http\Controllers\Auth\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\Comment\Entities\Reply;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::CANDIDATE_HOME;


    public function __construct()
    {
        $this->middleware('guest:candidate')->except('logout');
    }
    protected function guard()
    {
        return Auth::guard('candidate');
    }

    public function showLoginForm()
    {
        return view('auth.candidate.login');
    }
}
