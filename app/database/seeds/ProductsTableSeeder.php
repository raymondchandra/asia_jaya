<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		
		Product::create([
			'product_code' => "000000",
			'name' => "Barang Obral",
			'modal_price' => "0",
			'min_price' => "0",
			'sales_price' => "0",
			'stock_shop' => "0",
			'stock_storage' => "0",
			'type' => $faker->text,
			'deleted' => 0
		]);
		
		foreach(range(1, 2) as $index)
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