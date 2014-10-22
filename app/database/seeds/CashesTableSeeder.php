<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CashesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$current = 0;
		foreach(range(1, 10) as $index)
		{
			$in = $faker->randomNumber(9);
			$out = $faker->randomNumber(9);
			$current += $in-$out;
			Cash::create([
				'transaction_id' => $index,
				'in' => $in,
				'out' => $out,
				'current' => $current,
				'type' => $faker->text,
			]);
		}
	}

}