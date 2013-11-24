<?php

class AddressesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('addresses')->truncate();

		$addresses = array(
	        array(
	           'civilite'   => '2',
	           'prenom'     => 'Cindy',
	           'nom'        => 'Leschaud',
	           'email'      => 'cindy.leschaud@gmail.com',
	           'entreprise' => 'Unine',
	           'fonction'   => 'Web Developpeur',
	           'profession' => '6',
	           'telephone'  => '078 690 00 23',
	           'mobile'     => '078 690 00 23',
	           'adresse'    => 'Ruelle de l\'hôtel de ville 3',
	           'cp'         => '',
	           'complement' => '',
	           'npa'        => '2520',
	           'ville'      => 'La Neuveville',
	           'canton'     => '6',
	           'pays'       => '247',
	           'type'       => '1',
	           'user_id'    => '1',	           
	           'livraison'  => '1',	           
	           'deleted'    => '0'       
	        )
		);

		// Uncomment the below to run the seeder
		DB::table('addresses')->insert($addresses);
	}

}