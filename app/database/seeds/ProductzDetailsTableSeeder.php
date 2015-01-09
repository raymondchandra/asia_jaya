<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductzDetailsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for ($i=1; $i < 11; $i++)
		{
			if($i < 10)
			{
				$photoName = '0'.$i;
			}
			else
			{
				$photoName = '00'.$i;
			}
			ProductDetail::create([
				'color' => $faker->colorName,
				//http://localhost/asia_jaya/public/assets/product_img/001.jpg
				'photo' => 'assets/product_img/0'.$photoName.'.jpg',
				'stock_shop' => $faker->randomNumber(3),
				'stock_storage' => $faker->randomNumber(3),
				'product_id' => $i,
				'deleted' => 0
			]);
		}
	}

}