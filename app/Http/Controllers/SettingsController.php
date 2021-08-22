<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSettings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Website setting page.
    public function index($page)
    {
        switch ($page) {
            case 'website':
                $website_setting = WebsiteSettings::first();
                return view('backend.settings.pages.website', compact('website_setting'));
                break;
            case 'layout':
                return view('backend.settings.pages.layout');
                break;
            case 'color':
                return view('backend.settings.pages.color-picker');
                break;
            case 'language':
                return view('backend.settings.pages.language');
                break;
            case 'payment':
                return view('backend.settings.pages.payment');
                break;
            case 'mail':
                return view('backend.settings.pages.mail');
                break;
            case 'custom':
                return view('backend.settings.pages.custom');
                break;
            case 'currency':
                return view('backend.settings.pages.currency');
                break;
            case 'theme':
                return view('backend.settings.pages.theme');
                break;
            default:
                $website_setting = WebsiteSettings::first();
                return view('backend.settings.pages.website', compact('website_setting'));
                break;
        }

        return 123;
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
            $site_settings = WebsiteSettings::first();
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
}
