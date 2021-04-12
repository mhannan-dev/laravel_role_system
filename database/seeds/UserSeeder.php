<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
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
        $user = User::where('email', 'admin@admin.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Admin M Hannan";
            $user->email = "admin@admin.com";
            $user->password = Hash::make('12345678');
            $user->save();
        }
    }
}
