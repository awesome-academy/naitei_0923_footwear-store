<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateInitialAdminAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // unguard(): disable all mass assignable restrictions.
        User::unguard();

        User::create([
            'email' => 'bui.minh.dung@sun-asterisk.com',
            'password' => bcrypt('Admin123.'),
            'first_name' => 'Administrator',
            'last_name' => 'Account',
            'is_active' => true,
            'username' => 'administrator-account',
            'phone' => '0986653341',
            'email_verified_at' => now(),
            'address' => 'Ha Noi',
        ]);

        $user = User::where('email', '=','bui.minh.dung@sun-asterisk.com')->first();
        $roleId = Role::where('role', '=','admin')->first();
        $user->roles()->attach($roleId);
    }
}
