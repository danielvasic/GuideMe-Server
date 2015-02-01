<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$this->call('GroupTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('PlaceTypeTableSeeder');
	}

}
