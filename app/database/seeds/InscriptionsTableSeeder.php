<?php

class InscriptionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('inscriptions')->truncate();

		$inscriptions = array(
			array( 
				'event_id'        => 1, // changed
				'user_id'         => 1,
				'price_id'         => 1,
				'noInscription'   => '1-2014/1',
				'dateInscription' => date('Y-m-d G:i:s')
			),
			array( 
				'event_id'        => 2, // changed
				'user_id'         => 1,
				'price_id'         => 2,
				'noInscription'   => '2-2014/1',
				'dateInscription' => date('Y-m-d G:i:s')				
			),
			array( 
				'event_id'        => 1, // changed
				'user_id'         => 1,
				'price_id'         => 1,
				'noInscription'   => '3-2014/1',
				'dateInscription' => date('Y-m-d G:i:s')	
			),
			array( 
				'event_id'        => 4, // changed
				'user_id'         => 1,
				'price_id'         => 3,
				'noInscription'   => '4-2014/1',
				'dateInscription' => date('Y-m-d G:i:s')				
			)
		);

		// Uncomment the below to run the seeder
		DB::table('inscriptions')->insert($inscriptions);
	}

}
