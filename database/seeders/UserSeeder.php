<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\SuperAdmin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::findById(1);
        $user = SuperAdmin::where('email', 'developer@mail.com')->first();
        if (is_null($user)) {
            $user = new SuperAdmin();
            $user->name = "Zakir Soft";
            $user->email = "developer@mail.com";
            $user->image = "backend/image/default.png";
            $user->password = bcrypt('password');
            $user->email_verified_at = Carbon::now();
            $user->remember_token = Str::random(10);
            $user->save();
        }
        $user->assignRole($role);


        $admin = new Admin();
        $admin->name = "Admin";
        $admin->email = "admin@mail.com";
        $admin->image = "backend/image/default.png";
        $admin->password = bcrypt('password');
        $admin->email_verified_at = Carbon::now();
        $admin->remember_token = Str::random(10);
        $admin->save();
    }
}
