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
		$this->call('UsersTableSeeder');		
		$this->call('SentryGroupSeeder');
		$this->call('SentryUserGroupSeeder');		
		$this->call('ComptesTableSeeder');
		$this->call('FilesTableSeeder');
		$this->call('SpecialisationsTableSeeder');
		$this->call('Event_specialisationTableSeeder');

		$this->call('MembresTableSeeder');
		$this->call('ProfessionsTableSeeder');
		$this->call('InscriptionsTableSeeder');
		$this->call('Cm_articlesTableSeeder');
		$this->call('Cm_articles_pricesTableSeeder');
		$this->call('Cm_articles_typesTableSeeder');
		$this->call('Cm_articles_attributesTableSeeder');
		$this->call('Cm_attributesTableSeeder');
		$this->call('CentersTableSeeder');
	}

}