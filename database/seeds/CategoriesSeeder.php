<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([[
            'id' => 1,
            'name' => 'PHONE'
        ], [
            'id' => 2,
            'name' => 'LAPTOP'
        ]]);
    }
}
