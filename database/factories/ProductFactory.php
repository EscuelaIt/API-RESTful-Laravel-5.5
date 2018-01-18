<?php

use App\User;
use App\Product;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity' => $faker->numberBetween(1, 10),
        'status' => $faker->randomElement([Product::AVAILABLE, Product::NOT_AVAILABLE]),
        'seller_id' => User::all()->random()->id,
    ];
});
