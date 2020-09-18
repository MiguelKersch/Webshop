<?php

use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($category = 1; $category <= 5;$category++){
            for($product = 1; $product <= 5; $product++){
            $categoryProduct = new \App\CategoryProduct([
                'category_id' => $category,
                'product_id' => $product, 
            ]);
            $categoryProduct->save();
        }
     }
        
    }
}
