<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Website setting page.
    public function index($page)
    {
        $setting = Setting::first();

        switch ($page) {
            case 'website':
                return view('backend.settings.pages.website', compact('setting'));
                break;
            case 'layout':
                return view('backend.settings.pages.layout');
                break;
            case 'color':
                return view('backend.settings.pages.color-picker');
                break;
            case 'custom':
                return view('backend.settings.pages.custom', compact('setting'));
                break;
                // case 'language':
                //     return view('backend.settings.pages.language');
                //     break;
                // case 'payment':
                //     return view('backend.settings.pages.payment');
                //     break;
                // case 'mail':
                //     return view('backend.settings.pages.mail');
                //     break;
                // case 'currency':
                //     return view('backend.settings.pages.currency');
                //     break;
                // case 'theme':
                //     return view('backend.settings.pages.theme');
                //     break;
            default:
                abort(404);
        }
    }


    public function layoutChange()
    {
        $layout = request()->layout;
        session(['layout_mode' => $layout]);
        return back();
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
                    $this->colorUpdate($request);
                    $message = 'Color Setting';
                    break;
                case 'custom':
                    $this->custumCSSJSUpdate($request);
                    $message = 'Custom Setting';
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


    /**
     * Website Data Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function websiteUpdate($request)
    {
        $setting = Setting::first();

        // Website update
        $setting->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($logo_image = $request->logo_image) {
            $url = uploadImage($logo_image, 'website');
            deleteImage($setting->logo_image);
            $setting->update(['logo_image' => $url]);
        }

        if ($fav_icon = $request->favicon_image) {
            $url = uploadImage($fav_icon, 'website');
            deleteImage($setting->favicon_image);
            $setting->update(['favicon_image' => $url]);
        }

        return true;
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
}
