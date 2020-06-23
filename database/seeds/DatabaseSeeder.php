<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($category = 1; $category < 6; $category++) {
            DB::table('category')->insert([
                'name' => 'category' . $category,
                'description' => 'description'
            ]);
        }

        for ($category = 1; $category < 6; $category++) {
            for ($product = 1; $product < 6; $product++) {
                DB::table('product')->insert([
                    'name' => 'product' . $product,
                    'description' => 'description',
                    'price' => $product,
                    'category_id' => $category
                ]);
            }
        }
    }
}
