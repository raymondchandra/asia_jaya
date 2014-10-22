<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AccountsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$number = rand(0, 2);
			if($number == 0)
			{
				$role = "sales";
			}
			else if($number == 1)
			{
				$role = "manager";
			}
			else
			{
				$role = "owner";
			}
			Account::create([
				'username' => $faker->userName,
				'password' => $faker->password,
				'role' => $role,
				'last_login' => $faker->dateTime($max = 'now') ,
				'active' => 1
			]);
		}
	}

}