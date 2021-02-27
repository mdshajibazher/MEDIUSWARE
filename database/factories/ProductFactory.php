<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'sku' => Str::slug($faker->name,'-'),
        'description' => $faker->text,
        'description' => $faker->text,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
