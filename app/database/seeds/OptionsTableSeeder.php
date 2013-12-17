<?php

class OptionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('options')->truncate();

		$options = array(

			array( 
				'titreOption' => 'Participation au souper', // changed
				'typeOption'  => 'checkbox'
			),
			array( 
				'titreOption' => 'Réservation', // changed
				'typeOption'  => 'checkbox'
			),
			array( 
				'titreOption' => 'Quel est votre université', // changed
				'typeOption'  => 'text'
			)						
		);

		// Uncomment the below to run the seeder
		DB::table('options')->insert($options);
	}

}
