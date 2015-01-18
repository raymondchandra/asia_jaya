<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductzDetailsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		
		ProductDetail::create([
			'color' => "-",
			//http://localhost/asia_jaya/public/assets/product_img/001.jpg
			'photo' => '-',
			'stock_shop' => "0",
			'stock_storage' => "0",
			'product_id' => 1,
			'deleted' => 0
		]);
	}

}