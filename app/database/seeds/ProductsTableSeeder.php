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
	}

}