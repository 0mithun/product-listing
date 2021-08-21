<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    // Website setting page.
    public function index()
    {
        $site_settings = WebsiteSettings::all();
        return view('backend.settings.pages.website', compact('site_settings'));
    }

    // color setting.
    public function color()
    {
        return view('backend.settings.pages.color-picker');
    }

    // color setting.
    public function layout()
    {
        return view('backend.settings.pages.layout');
    }

    // color setting.
    public function language()
    {
        return view('backend.settings.pages.language');
    }

    // color setting.
    public function payment()
    {
        return view('backend.settings.pages.payment');
    }

    // color setting.
    public function mail()
    {
        return view('backend.settings.pages.mail');
    }

    // color setting.
    public function custom()
    {
        return view('backend.settings.pages.custom');
    }

    // color setting.
    public function currency()
    {
        return view('backend.settings.pages.currency');
    }

    // color setting.
    public function theme()
    {
        return view('backend.settings.pages.theme');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteSettings  $websiteSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => "required",
            'email' => "required",
        ]);

        $site_settings = WebsiteSettings::find($id);
        $site_settings->name = $request->name;
        $site_settings->email = $request->email;
        if ($request->has('logo_image')) {
            $this->validate($request, [
                'logo_image' => "required|max:2048",
            ]);
            $image = $request->logo_image;
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public/website', $image, $fileName);
            $db_image = 'storage/website/' . $fileName;
            $site_settings->logo_image = $db_image;
        }
        if ($request->has('favicon_image')) {
            $this->validate($request, [
                'favicon_image' => "required|max:2048",
            ]);
            $image = $request->favicon_image;
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public/website', $image, $fileName);
            $db_image = 'storage/website/' . $fileName;
            $site_settings->favicon_image = $db_image;
        }
        $site_settings->save();
        session()->flash('success', 'Site Settings Content Updated Successfully!');
        return back();
    }
}
