<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductzDetailsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for ($i=1; $i < 11; $i++)
		{
			ProductDetail::create([
				'color' => $faker->colorName,
				//http://localhost/asia_jaya/public/assets/product_img/001.jpg
				'photo' => 'http://localhost/asia_jaya/public/assets/product_img/00'.$i.'.jpg',
				'stock_shop' => $faker->randomNumber(3),
				'stock_storage' => $faker->randomNumber(3),
				'product_id' => $i,
				'deleted' => 0
			]);
		}
	}

}