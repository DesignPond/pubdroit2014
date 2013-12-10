<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('Newsletter_listsTableSeeder');
		$this->call('Newsletter_usersTableSeeder');
		$this->call('AddressesTableSeeder');
		$this->call('Adresse_typesTableSeeder');
		$this->call('EventsTableSeeder');
		$this->call('OptionsTableSeeder');
		$this->call('PricesTableSeeder');
		$this->call('EventsoptionsTableSeeder');	
		$this->call('UsersTableSeeder');		
		$this->call('SentryGroupSeeder');
		$this->call('SentryUserGroupSeeder');
		
	}

}