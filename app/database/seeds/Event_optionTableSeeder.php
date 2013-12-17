<?php

class Event_optionTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('event_options')->truncate();

		$event_option = array(
			array( 
				'event_id'     => 1, // changed
				'option_id' => 1 // changed
			),
			array( 
				'event_id'     => 1, // changed
				'option_id' => 2 // changed
			),
			array( 
				'event_id'     => 2, // changed
				'option_id' => 1 // changed
			),
			array( 
				'event_id'     => 2, // changed
				'option_id' => 2 // changed
			),
			array( 
				'event_id'     => 2, // changed
				'option_id' => 3 // changed
			)
		);

		// Uncomment the below to run the seeder
		DB::table('event_options')->insert($event_option);
	}

}
