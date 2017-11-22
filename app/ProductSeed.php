<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Faker\Factory as FakerFactory;

class ProductSeed extends Model
{
    protected $guarded = [];

	// public $length;

 //    public function __construct()
 //    {

 //    	// $this->faker = $faker;
    
 //    }

    public function generate($length)
    {

    	// Faker $faker;

    	$length = 5;

    	$faker = FakerFactory::create();

    	$ar_faker = FakerFactory::create('ar_SA');

    	for($i = 0; $i < $length; $i++){
    	
	    	ProductSeed::create([

		    	'code' => $faker->ean8,

				'name' => $faker->word,

				'name_ar' => $ar_faker->name,

				'price' => $faker->numberBetween($min = 100, $max = 5000),

				'quantity' => $faker->randomDigitNotNull,

				'discount_pct' => $faker->numberBetween($min = 0, $max = 10),

				'image' => $faker->image($dir = 'public/storage/products-images', $width = 640, $height = 480)
			]);

    	}

    }
}
