<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(\App\Models\User::count()){
            return;
        }
        $user=new \App\Models\User();
        $user->name="admin user";
        $user->email="admin@hotel.com ";
        $user->password=\Illuminate\Support\Facades\Hash::make("12345");
        $user->remember_token = Str::random(10);
     $user->save();


        $guest=new \App\Models\User();
        $guest->name="guest";
        $guest->email="guest@hotel.com ";
        $guest->password=\Illuminate\Support\Facades\Hash::make("12345");
        $user->remember_token = Str::random(10);
        $guest->save();

    }

}
