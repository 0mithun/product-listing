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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteSettings  $id
     * @return \Illuminate\Http\Response
     */
    public function website(Request $request)
    {
        $this->validate($request, [
            'name' => "required",
            'email' => "required",
        ]);

        try {
            $site_settings = Setting::first();
            $site_settings->name = $request->name;
            $site_settings->email = $request->email;
            $site_settings->save();

            $logo_image = $request->logo_image;
            $fav_icon = $request->favicon_image;

            if ($logo_image) {
                $url = uploadImage($logo_image, 'website');
                $site_settings->update(['logo_image' => $url]);
            }

            if ($fav_icon) {
                $url = uploadImage($fav_icon, 'website');
                $site_settings->update(['favicon_image' => $url]);
            }

            flashSuccess('Site Settings Content Updated Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError($th->getMessage());
            return back();
        }
    }

    public function layoutChange()
    {
        $layout = request()->layout;
        session(['layout_mode' => $layout]);
        return back();
    }

    public function update(Request $request, $page)
    {
        try {
            switch ($page) {
                case 'color':
                    $this->colorUpdate($request);
                    flashSuccess('Color Setting Updated Successfully');
                    return back();
                    break;
                case 'custom':
                    $this->custumCSSJSUpdate($request);
                    flashSuccess('Custom Setting Updated Successfully');
                    return back();
                    break;
                default:
                    abort(404);
            }
        } catch (\Throwable $th) {
            flashError($th->getMessage());
            return back();
        }
    }


    public function colorUpdate($request)
    {
        return Setting::first()->update(['slider_color' => $request->slider_color]);
    }

    public function custumCSSJSUpdate($request)
    {
        $custom_css_js = $request->only(['header_css', 'header_script', 'body_script']);
        return Setting::first()->update($custom_css_js);
    }
}
