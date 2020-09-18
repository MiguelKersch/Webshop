<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
            'name' => $this->faker->name,
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Nunc consequat varius lacus, in eleifend nunc ultricies sed. Aenean scelerisque.",
            'price' => rand(1,250),
    ];
});
