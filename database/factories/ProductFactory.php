<?php

use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;

$factory->define(App\ProductSeed::class, function (Faker $faker) {
    
    return [

		'code' => $faker->ean8,

		'name' => $faker->word,

		'price' => $faker->numberBetween($min = 100, $max = 5000),

		'quantity' => $faker->randomDigitNotNull,

		'discount_pct' => $faker->numberBetween($min = 0, $max = 50),

		'image' => $faker->image($dir = 'public/storage/products-images', $width = 640, $height = 480)

    ];

});
