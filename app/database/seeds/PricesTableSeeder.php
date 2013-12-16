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
				'rangPrix'     => 1,
				'typePrix'     => 1 
			),
			array( 
				'event_id'     => 1, // changed
				'remarquePrix' => 'Prix étudiants', // changed
				'prix'         => 100, // changed
				'rangPrix'     => 1,
				'typePrix'     => 2 
			),
			array( 
				'event_id'     => 2, // changed
				'remarquePrix' => 'Prix normal 2', // changed
				'prix'         => 80, // changed
				'rangPrix'     => 1,
				'typePrix'     => 1 
			),
			array( 
				'event_id'     => 2, // changed
				'remarquePrix' => 'Prix étudiants', // changed
				'prix'         => 100, // changed
				'rangPrix'     => 2,
				'typePrix'     => 1 
			),
			array( 
				'event_id'     => 2, // changed
				'remarquePrix' => 'Prix tout compris', // changed
				'prix'         => 150, // changed
				'rangPrix'     => 3,
				'typePrix'     => 1 
			),
			array( 
				'event_id'     => 2, // changed
				'remarquePrix' => 'Prix tout compris gratuit', // changed
				'prix'         => 0, // changed
				'rangPrix'     => 2,
				'typePrix'     => 2 
			),
			array( 
				'event_id'     => 2, // changed
				'remarquePrix' => 'Prix invité', // changed
				'prix'         => 10, // changed
				'rangPrix'     => 1,
				'typePrix'     => 2 
			)		
		);

		// Uncomment the below to run the seeder
		DB::table('prices')->insert($prices);
	}

}
