<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Product::create([
				'product_code' => $faker->randomNumber(5),
				'name' => $faker->word,
				'modal_price' => $faker->randomNumber(6),
				'min_price' => $faker->randomNumber(6),
				'sales_price' => $faker->randomNumber(6),
				'stock_shop' => $faker->randomNumber(3),
				'stock_storage' => $faker->randomNumber(3),
				'type' => $faker->text,
				'deleted' => 0
			]);
		}
	}

}