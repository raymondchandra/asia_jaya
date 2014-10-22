<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TaxesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		Tax::create([
			'amount' => 10
		]);
	}

}