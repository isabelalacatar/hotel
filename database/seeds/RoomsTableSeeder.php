<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoomsTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('rooms')->insert([
            'name' => Str::random(10),
            'floor' => Str::random(10),
            'type' => Str::random(10),
            'view' => Str::random(10),
            'status' => Str::random(10),
            'hotel_id' => Str::random(10),



        ]);

    }

}
