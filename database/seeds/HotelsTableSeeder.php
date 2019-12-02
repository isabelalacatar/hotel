<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(\App\Models\Hotel::count()) {
            return;
        }
        DB::table('hotels')->insert([
            'name' => Str::random(10),
            'city' => Str::random(10),
            'country' => Str::random(10),
            'street' => Str::random(10),
            'phone' => Str::random(10),

            'email' => Str::random(10) . '@gmail.com',

        ]);

    }

}
