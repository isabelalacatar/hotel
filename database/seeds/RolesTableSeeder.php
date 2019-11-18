<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \Spatie\Permission\Models\Role::findOrCreate("admin","");
       \Spatie\Permission\Models\Role::findOrCreate("guest","");

    }
}
