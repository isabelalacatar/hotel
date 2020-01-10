<?php

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'description' => Str::random(10),
           'user_id' => Str::random(10),
            'hotel_id' => Str::random(10),
            'rating' => Str::random(10)

        ]);
    }
}
