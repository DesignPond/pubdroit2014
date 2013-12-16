<?php

class SpecialisationsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('specialisations')->truncate();

		$specialisations = array(
			array( 
				'titreSpecialisation' => 'Bail'
			),
			array( 
				'titreSpecialisation' => 'CERT'
			),
			array( 
				'titreSpecialisation' => 'CCFI'
			),
			array( 
				'titreSpecialisation' => 'CEMAJ'
			),
			array( 
				'titreSpecialisation' => 'CITU'
			),
			array( 
				'titreSpecialisation' => 'IDS'
			)	
		);

		// Uncomment the below to run the seeder
		DB::table('specialisations')->insert($specialisations);
	}

}
