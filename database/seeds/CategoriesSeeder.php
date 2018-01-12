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
            'name' => 'BOOKS'
        ], [
            'id' => 2,
            'name' => 'CARDS'
        ], [
            'id' => 3,
            'name' => 'CHARTS'
        ], [
            'id' => 4,
            'name' => 'LEARNING AIDS'
        ], [
            'id' => 5,
            'name' => 'AUDIO BOOKS'
        ], [
            'id' => 6,
            'name' => 'E-BOOKS'
        ]]);
    }
}
