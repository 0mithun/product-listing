<?php

namespace App\Http\Controllers\Admin;

use App\Models\Socialite;
use msztorc\LaravelEnv\Env;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.pages.socialite')->withSocialite(Socialite::first());
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Socialite  $socialite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->type == 'google'){
            $this->updateGoogleCredential($request);
        }
        else if($request->type == 'facebook'){
            $this->updateFacebookCredential($request);
        }
        else if($request->type == 'twitter'){
            $this->updateTwitterkCredential($request);
        }
        else if($request->type == 'linkedin'){
            $this->updateLinkedinkCredential($request);
        }
    }


    /**
     * Update login with google credential
     *
     * @param Request $request
     * @return void
     */
    public function updateGoogleCredential(Request $request)
    {
        $request->validate([
            'google_client_id'      =>  ['required',],
            'google_client_secret'      =>  ['required',],
        ]);

        Socialite::first()->update(['google'=> request('google', 0)]);

        $this->updateEnv($request);
    }


    /**
     * Update login with facebook credential
     *
     * @param Request $request
     * @return void
     */
    public function updateFacebookCredential(Request $request)
    {
        $request->validate([
            'facebook_client_id'      =>  ['required',],
            'facebook_client_secret'      =>  ['required',],
        ]);

        Socialite::first()->update(['facebook'=> request('facebook', 0)]);

        $this->updateEnv($request);
    }



    /**
     * Update login with twitter credential
     *
     * @param Request $request
     * @return void
     */
    public function updateTwitterkCredential(Request $request)
    {
        $request->validate([
            'twitter_client_id'      =>  ['required',],
            'twitter_client_secret'      =>  ['required',],
        ]);

        Socialite::first()->update(['twitter'=> request('twitter', 0)]);

        $this->updateEnv($request);
    }



    /**
     * Update login with linkedin credential
     *
     * @param Request $request
     * @return void
     */
    public function updateLinkedinkCredential(Request $request)
    {
        $request->validate([
            'linkedin_client_id'      =>  ['required',],
            'linkedin_client_secret'      =>  ['required',],
        ]);

        Socialite::first()->update(['linkedin'=> request('linkedin', 0)]);

        $this->updateEnv($request);
    }



    /**
     * Update Socialite login credential in .env file
     *
     * @param Request $request
     * @return void
     */
    private function updateEnv(Request $request)
    {
        $data = $request->only(['google_client_id', 'google_client_secret', 'facebook_client_id', 'facebook_client_secret',
        'twitter_client_id', 'twitter_client_secret', 'linkedin_client_id', 'linkedin_client_secret']);

        foreach($data as $key => $value){
            $env = new Env();
            $env->setValue(strtoupper($key), $value);

        }

        session()->flash('success', ucfirst($request->type).' Setting update succcessfully!');

        return redirect()->route('settings.social.login')->send();
    }

}
