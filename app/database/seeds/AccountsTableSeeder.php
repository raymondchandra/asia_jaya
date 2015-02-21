<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AccountsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		
		Account::create([
			'username' => 'owner',
			'password' => Hash::make('owner'),
			'role' => 1,
			'last_login' => $faker->dateTime($max = 'now') ,
			'active' => 1
		]);
		
		Account::create([
			'username' => 'mgr',
			'password' => Hash::make('mgr'),
			'role' => 2,
			'last_login' => $faker->dateTime($max = 'now') ,
			'active' => 1
		]);
		
		Account::create([
			'username' => 'sales',
			'password' => Hash::make('sales'),
			'role' => 3,
			'last_login' => $faker->dateTime($max = 'now') ,
			'active' => 1
		]);

		Account::create([
			'username' => 'super',
			'password' => Hash::make('super'),
			'role' => 1,
			'last_login' => $faker->dateTime($max = 'now') ,
			'active' => 1
		]);
		
		/*
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
			
		}
		*/
	}
	

}