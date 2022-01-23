<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting();
        $setting->name = "Site Name";
        $setting->email = "example@mail.com";
        $setting->logo_image = "backend/image/logo-default.png";
        $setting->favicon_image = "backend/image/logo-default.png";
        $setting->save();
    }
}
