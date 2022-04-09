<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Faq\Database\Seeders\FaqCategorySeeder;
use Modules\Faq\Database\Seeders\FaqDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            SocialiteSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            FaqCategorySeeder::class,
            FaqDatabaseSeeder::class,
        ]);
    }
}
