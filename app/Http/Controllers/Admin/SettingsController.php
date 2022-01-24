<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function emailUpdate(Request $request)
    {
        $path = base_path('.env');

        if (file_exists($path)) {
            $data = $request->only(['mail_host','mail_port','mail_username', 'mail_password', 'mail_encryption', 'mail_from_name', 'mail_from_name']);
            foreach ($data as $key => $value) {
                $key = strtoupper($key);
                dd(  $key . '=' . env($key), $key . '=' . $value);
                // dd($key, $value);
                file_put_contents($path, str_replace(
                    $key . '=' . env($key), $key . '=' . $value, file_get_contents($path)
                ));
            }
        }

        return back()->with('success', 'Mail configuration update successfully');
    }

}
