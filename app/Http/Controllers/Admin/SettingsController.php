<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Traits\UploadAble;
use App\Mail\SmtpTestEmail;
use msztorc\LaravelEnv\Env;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class SettingsController extends Controller
{
    use UploadAble;


    /**
     * Undocumented function
     *
     * @return void
     */
    public function website()
    {
        return view('admin.settings.pages.website');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function layout()
    {
        return view('admin.settings.pages.layout');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function color()
    {
        return view('admin.settings.pages.color-picker');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function custom()
    {
        return view('admin.settings.pages.custom');
    }




    /**
     * Website Data Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function websiteUpdate(Request $request)
    {
        $request->validate([
            'name'      =>  ['required'],
            'email'      =>  ['required'],
            'logo_image'      =>  ['nullable', 'mimes:png,jpg,svg'],
            'favicon_image'      =>  ['nullable', 'mimes:png,ico'],
        ]);

        $data = $request->only(['name', 'email']);
        $setting = Setting::first();

        if($request->hasFile('logo_image')){
            $data['logo_image'] = $this->uploadOne($request->logo_image, 'website/logo');
            $this->deleteOne($setting->logo_image);
        }

        if($request->hasFile('favicon_image')){
            $data['favicon_image'] = $this->uploadOne($request->favicon_image, 'website/logo');
            $this->deleteOne($setting->favicon_image);
        }

        $setting->update($data);

        return back()->with('success', 'Website setting upadte successfully!');
    }

    /**
     * Update website layout
     *
     * @return void
     */
    public function layoutUpdate()
    {
        Setting::first()->update(request()->only('default_layout'));

        return back()->with('success', 'Website layout upadte successfully!');
    }


    /**
     * color Data Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function colorUpdate()
    {
        Setting::first()->update(request()->only(['sidebar_color', 'nav_color']));

        return back()->with('success', 'Color setting upadte successfully!');
    }

    /**
     * custom js and css Data Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function custumCSSJSUpdate()
    {
        Setting::first()->update(request()->only(['header_css', 'header_script', 'body_script']));

        return back()->with('success', 'Custom css/js upadte successfully!');
    }

    /**
     * Mode Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function modeUpdate($request)
    {
        $dark_mode = $request->only(['dark_mode']);
        return Setting::first()->update($dark_mode);
    }

    public function email()
    {
        return view('admin.settings.pages.mail');
    }

    /**
     * Update mail configuration settings on .env file
     *
     * @param Request $request
     * @return void
     */
    public function emailUpdate(Request $request)
    {
        $request->validate([
            'mail_host'     =>  ['required',],
            'mail_port'     =>  ['required','numeric'],
            'mail_username'     =>  ['required',],
            'mail_password'     =>  ['required',],
            'mail_encryption'     =>  ['required',],
            'mail_from_name'     =>  ['required',],
            'mail_from_address'     =>  ['required','email'],
        ]);

        $data = $request->only(['mail_host','mail_port','mail_username', 'mail_password', 'mail_encryption', 'mail_from_name', 'mail_from_address']);

        foreach($data as $key => $value){
            $env = new Env();
            $env->setValue(strtoupper($key), $value);
        }

        return back()->with('success', 'Mail configuration update successfully');
    }

    public function testEmailSent()
    {
        request()->validate(['test_email' => ['required', 'email']]);
        try {
            Mail::to(request()->test_email)->send(new SmtpTestEmail);

            return back()->with('success', 'Test email sent successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Invalid email configuration. Mail send failed.');
        }
    }



    /**
     * View Website mode page
     *
     * @return void
     */
    public function mode()
    {
        return view('admin.settings.pages.mode');
    }


    /**
     * Commingsoon mode enable/disable
     *
     * @return void
     */
    public function modeCommingsoon()
    {
        Setting::first()->update(['commingsoon_mode'=> request('commingsoon_mode', 0)]);
        session()->put('commingsoon_mode', request('commingsoon_mode', 0));

        return back()->with('success', 'Comming soon mode enable successfully!');
    }


    /**
     * Maintance mode enable
     *
     * @return void
     */
    public function modeMaintaince()
    {
        if(request()->has('maintenance_mode') && \request('maintenance_mode') == 1){
            Artisan::call('down');

            return back()->with('success', 'Comming soon mode enable successfully!');
        }

        return back();
    }

}
