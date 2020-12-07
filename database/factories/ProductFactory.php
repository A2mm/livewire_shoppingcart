<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'                 =>  $faker->word,
        'price'                =>  $faker->numberBetween(100, 300),
        'description'          =>  $faker->sentence,
        'category_id'          =>  $faker->numberBetween(1, 5),
    ];
});
