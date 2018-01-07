<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@afiammuta.com',
            'phone_number' => '09198765432',
            'password' => '$2y$10$20uvTri3uDwjF0FgOKnameTQY.IQvgPIMAe2tXoxEUY/w.wiG8U8a',
            'admin' => true
        ]);
        $this->call(CategoriesSeeder::class);
        $this->call(ProductsSeeder::class);
    }
}
