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
        $user = User::where('email', 'user@user.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "User M Hannan";
            $user->email = "user@user.com";
            $user->password = Hash::make('12345678');
            $user->save();
        }
    }
}
