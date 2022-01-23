<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Traits\UploadAble;
use Illuminate\Http\Request;

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
        return view('backend.settings.pages.website');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function layout()
    {
        return view('backend.settings.pages.layout');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function color()
    {
        return view('backend.settings.pages.color-picker');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function custom()
    {
        return view('backend.settings.pages.custom');
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
}
