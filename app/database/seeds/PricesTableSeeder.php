<?php

class PricesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('prices')->truncate();

		$prices = array(
		
			array( 
				'event_id'     => 1, // changed
				'remarquePrix' => 'Prix normal', // changed
				'prix'         => 120, // changed
				'rangPrix'     => 1
			),
			array( 
				'event_id'     => 1, // changed
				'remarquePrix' => 'Prix étudiants', // changed
				'prix'         => 100, // changed
				'rangPrix'     => 2
			)	
		);

		// Uncomment the below to run the seeder
		DB::table('prices')->insert($prices);
	}

}
