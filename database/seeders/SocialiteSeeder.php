<?php

namespace Database\Seeders;

use App\Models\Socialite;
use Illuminate\Database\Seeder;

class SocialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Socialite::create();
    }
}
