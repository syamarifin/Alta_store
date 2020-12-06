<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_category')->insert([
            [
            	'name_category' => 'Pakaian',
            ],
            [
            	'name_category' => 'Aksesoris',
            ],
        ]);
    }
}
