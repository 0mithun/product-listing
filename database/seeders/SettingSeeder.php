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
        $setting->about = "lorem255";
        $setting->copyright_text = "&copy; copyright all right reserved";
        $setting->save();
    }
}
