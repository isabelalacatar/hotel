<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('model_has_roles')->count()) {
            return;
        }

        DB::table('model_has_roles')->insert([
            [
                'role_id' => '1',
                'model_type' => 'App\Models\User',
                'model_id' => '1'
            ],
            [
                'role_id' => '2',
                'model_type' => 'App\Models\User',
                'model_id' => '2'
            ]
        ]);
    }
}
