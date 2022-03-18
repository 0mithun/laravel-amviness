<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
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
        // user
        $user = new User();
        $user->name = 'user';
        $user->email = 'user@mail.com';
        $user->password = bcrypt('password');
        $user->save();


        //Role
        $role = Role::first();

        $admin = new Admin();
        $admin->name = "Admin";
        $admin->email = "admin@mail.com";
        $admin->image = "backend/image/default.png";
        $admin->password = bcrypt('password');
        $admin->email_verified_at = Carbon::now();
        $admin->remember_token = Str::random(10);
        $admin->save();

        $admin->assignRole($role);
    }
}
