<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            [
            	'name_product' => 'jaket',
            	'category_product' => 1,
            	'price' => 150000,
            ],
            [
            	'name_product' => 'Hem lengan panjang',
            	'category_product' => 1,
            	'price' => 120000,
            ],
            [
            	'name_product' => 'Jeans',
            	'category_product' => 1,
            	'price' => 200000,
            ],
        ]);
    }
}
