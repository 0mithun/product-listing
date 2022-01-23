<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Traits\UploadAble;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use UploadAble;

    public function website()
    {
        return view('backend.settings.pages.website');
    }
    public function layout()
    {
        return view('backend.settings.pages.layout');
    }
    public function color()
    {
        return view('backend.settings.pages.color-picker');
    }
    public function custom()
    {
        return view('backend.settings.pages.custom');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $page)
    {
        // return $request;
        try {
            switch ($page) {
                case 'website':
                    $this->validate($request, [
                        'name' => "required",
                        'email' => "required",
                    ]);

                    $this->websiteUpdate($request);
                    $message = 'Site Settings Content';
                    break;
                case 'color':
                    if (setting()->dark_mode) {
                        flashWarning("You can't cahnge color.Beacause you're in dark mode.");
                        return back();
                    } else {
                        $this->colorUpdate($request);
                        $message = 'Color Setting';
                    }
                    break;
                case 'custom':
                    $this->custumCSSJSUpdate($request);
                    $message = 'Custom Setting';
                    break;
                case 'dark_mode':

                    $this->modeUpdate($request);
                    $message = 'Mode';

                    break;
                case 'layout':
                    $this->layoutUpdate($request);
                    $message = 'Layout';
                    break;
                default:
                    abort(404);
            }

            flashSuccess($message . ' Updated Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError($th->getMessage());
            return back();
        }
    }

    public function layoutUpdate($request)
    {
        $layout = $request->only(['default_layout']);
        return Setting::first()->update($layout);
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
            'favicon_image'      =>  ['nullable', 'mimes:png,jpg,svg'],
        ]);

        $data = $request->only(['name', 'email']);

        $setting = Setting::first();

        if($request->hasFile('logo_image')){
            $data['logo_image'] = $this->uploadOne($request->logo_image, 'website');
            $this->deleteOne($setting->logo_image);
        }

        if($request->hasFile('favicon_image')){
            $data['favicon_image'] = $this->uploadOne($request->favicon_image, 'website');
            $this->deleteOne($setting->favicon_image);
        }

        $setting->update($data);

        return back()->with('success', 'Website setting upadte successfully!');
    }

    /**
     * color Data Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function colorUpdate($request)
    {
        $color = $request->only(['sidebar_color', 'nav_color']);
        return Setting::first()->update($color);
    }

    /**
     * custom js and css Data Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function custumCSSJSUpdate($request)
    {
        $custom_css_js = $request->only(['header_css', 'header_script', 'body_script']);
        return Setting::first()->update($custom_css_js);
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
