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
        $category = new \App\Category([
            'name' => "Taart",
            'description' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto placeat ullam commodi, animi quo enim pariatur laudantium earum, dicta facere incidunt tempora unde. Deleniti odit praesentium corrupti incidunt, unde aliquam?",
        ]);
        $category->save();
        
        $category = new \App\Category([
            'name' => "Kaas",
            'description' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto placeat ullam commodi, animi quo enim pariatur laudantium earum, dicta facere incidunt tempora unde. Deleniti odit praesentium corrupti incidunt, unde aliquam?",
        ]);
        $category->save();
        $category = new \App\Category([
            'name' => "Auto",
            'description' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto placeat ullam commodi, animi quo enim pariatur laudantium earum, dicta facere incidunt tempora unde. Deleniti odit praesentium corrupti incidunt, unde aliquam?",
        ]);
        $category->save();
        $category = new \App\Category([
            'name' => "Tennis",
            'description' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto placeat ullam commodi, animi quo enim pariatur laudantium earum, dicta facere incidunt tempora unde. Deleniti odit praesentium corrupti incidunt, unde aliquam?",
        ]);
        $category->save();
        $category = new \App\Category([
            'name' => "Spaans",
            'description' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto placeat ullam commodi, animi quo enim pariatur laudantium earum, dicta facere incidunt tempora unde. Deleniti odit praesentium corrupti incidunt, unde aliquam?",
        ]);
        $category->save();
    }
}
