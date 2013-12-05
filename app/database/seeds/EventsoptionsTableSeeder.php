<?php

class EventsoptionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('eventsoptions')->truncate();

		$eventsoptions = array(
			array( 
				'event_id'     => 1, // changed
				'specialisation_id' => 1 // changed
			),
			array( 
				'event_id'     => 1, // changed
				'specialisation_id' => 2 // changed
			)
		);

		// Uncomment the below to run the seeder
		DB::table('eventsoptions')->insert($eventsoptions);
	}

}
