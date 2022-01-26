<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Socialite;
use Illuminate\Http\Request;

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
        return $request->all();
    }

    public function updateGoogleCredential(Request $request)
    {
        $request->validate([
            'google_client_id'      =>  ['required',],
            'google_client_secret'      =>  ['required',],
        ]);

        if($request->has('google')){
            Socialite::first()->update(['google'=> request('google', 0)]);
        }

        $this->updateEnv($request);
    }

    public function updateEnv(Request $request)
    {
        $data = $request->only(['google_client_id', 'google_client_secret', 'facebook_client_id', 'facebook_client_seceret',
        'twitter_client_id', 'twitter_client_secret', 'linkedin_client_id', 'linkedin_client_secret']);

        foreach($data as $key => $value){
            //update .env variable
        }
    }


    public function dataUpdate(Request $request, $provider)
    {
        $socialSetting = SocialSetting::first();

        switch ($provider) {
            case 'google':
                if ($request->google) {
                    $request->validate([
                        'google_id' => 'required|string',
                        'google_secret' => 'required|string',
                    ]);
                }
                $this->googleSettings($request, $socialSetting);
                break;
            case 'facebook':
                if ($request->facebook) {
                    $request->validate([
                        'facebook_id' => 'required|string',
                        'facebook_secret' => 'required|string',
                    ]);
                }
                $this->facebookSettings($request, $socialSetting);
                break;
            case 'twitter':
                if ($request->twitter) {
                    $request->validate([
                        'twitter_id' => 'required|string',
                        'twitter_secret' => 'required|string',
                    ]);
                }
                $this->twitterSettings($request, $socialSetting);
                break;
            case 'linkedin':
                if ($request->linkedin) {
                    $request->validate([
                        'linkedin_id' => 'required|string',
                        'linkedin_secret' => 'required|string',
                    ]);
                }
                $this->linkedinSettings($request, $socialSetting);
                break;
            case 'github':
                if ($request->github) {
                    $request->validate([
                        'github_id' => 'required|string',
                        'github_secret' => 'required|string',
                    ]);
                }
                $this->githubSettings($request, $socialSetting);
                break;
            case 'gitlab':
                if ($request->gitlab) {
                    $request->validate([
                        'gitlab_id' => 'required|string',
                        'gitlab_secret' => 'required|string',
                    ]);
                }
                $this->gitlabSettings($request, $socialSetting);
                break;
            case 'bitbucket':
                if ($request->bitbucket) {
                    $request->validate([
                        'bitbucket_id' => 'required|string',
                        'bitbucket_secret' => 'required|string',
                    ]);
                }
                $this->bitbucketSettings($request, $socialSetting);
                break;
        }


        flashSuccess('Social Setting Updated Successfully');
        return back();

        return $request->all();
    }

    public function googleSettings($request, $socialSetting)
    {
        envReplace('GOOGLE_CLIENT_ID', $request->google_id);
        envReplace('GOOGLE_CLIENT_SECRET', $request->google_secret);

        return $socialSetting->update(['google' => $request->google ?? false]);
    }

    public function facebookSettings($request, $socialSetting)
    {
        envReplace('FACEBOOK_CLIENT_ID', $request->facebook_id);
        envReplace('FACEBOOK_CLIENT_SECRET', $request->facebook_secret);
        return $socialSetting->update(['facebook' => $request->facebook ?? false]);
    }

    public function twitterSettings($request, $socialSetting)
    {
        envReplace('TWITTER_CLIENT_ID', $request->twitter_id);
        envReplace('TWITTER_CLIENT_SECRET', $request->twitter_secret);
        return $socialSetting->update(['twitter' => $request->twitter ?? false]);
    }

    public function linkedinSettings($request, $socialSetting)
    {
        envReplace('LINKEDIN_CLIENT_ID', $request->linkedin_id);
        envReplace('LINKEDIN_CLIENT_SECRET', $request->linkedin_secret);
        return $socialSetting->update(['linkedin' => $request->linkedin ?? false]);
    }

    public function githubSettings($request, $socialSetting)
    {
        envReplace('GITHUB_CLIENT_ID', $request->github_id);
        envReplace('GITHUB_CLIENT_SECRET', $request->github_secret);
        return $socialSetting->update(['github' => $request->github ?? false]);
    }

    public function gitlabSettings($request, $socialSetting)
    {
        envReplace('GITLAB_CLIENT_ID', $request->gitlab_id);
        envReplace('GITLAB_CLIENT_SECRET', $request->gitlab_secret);
        return $socialSetting->update(['gitlab' => $request->gitlab ?? false]);
    }

    public function bitbucketSettings($request, $socialSetting)
    {
        envReplace('BITBUCKET_CLIENT_ID', $request->bitbucket_id);
        envReplace('BITBUCKET_CLIENT_SECRET', $request->bitbucket_secret);
        return $socialSetting->update(['bitbucket' => $request->bitbucket ?? false]);
    }
}
