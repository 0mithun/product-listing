<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use App\Actions\Profile\ProfileUpdate;

class ProfileController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Profile View.
     *
     * @return void
     */
    public function profile()
    {
        if (is_null($this->user) || !$this->user->can('profile.view')) {
            abort(403, 'Sorry !! You are Unauthorized to profile.');
        }
        $user = auth()->user();
        return view('admin.profile.index', compact('user'));
    }

    /**
     * Profile Setting.
     *
     * @return void
     */
    public function setting()
    {
        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to profile settings.');
        }
        $user = auth()->user();
        return view('admin.profile.setting', compact('user'));
    }


    /**
     * Profile Update.
     *
     * @param ProfileRequest $request
     * @return \Illuminate\Http\Response
     */
    public function profile_update(ProfileRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to profile settings.');
        }

        try {
            $profile = ProfileUpdate::update($request);

            if ($profile) {
                flashSuccess('Profile Updated Successfully');
                return back();
            } else {
                flashError('Current password does not match');
                return back();
            }
        } catch (\Throwable $th) {
            flashError($th->getMessage());
            return back();
        }
    }
}
