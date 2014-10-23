<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TransactionsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Transaction::create([
				'customer_id' => $faker->numberBetween(1,10),
				'total' => $faker->randomNumber(9),
				'discount' => $faker->randomNumber(6),
				'tax' => $faker->randomNumber(6),
				'print_customer' => $faker->numberBetween(0,1),
				'print_shop' => $faker->numberBetween(0,1),
				'is_void' => 0,
				'saled_id' => $faker->numberBetween(1,10),
				'status' => $faker->text,
			]);
		}
	}

}