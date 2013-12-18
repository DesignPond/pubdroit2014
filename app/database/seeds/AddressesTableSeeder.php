<?php

class AddressesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('adresses')->truncate();

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
	           'deleted'    => '0',
	           'created_at' => date('Y-m-d G:i:s'),
			   'updated_at' => date('Y-m-d G:i:s')        
	        ),
	        array(
	           'civilite'   => '2',
	           'prenom'     => 'Cindy',
	           'nom'        => 'Leschaud',
	           'email'      => 'pruntrut@yahoo.fr',
	           'entreprise' => 'Faculté de droit',
	           'fonction'   => 'Web Développeur',
	           'profession' => '6',
	           'telephone'  => '032 718 12 31',
	           'mobile'     => '078 690 00 23',
	           'adresse'    => 'Breguet 1',
	           'cp'         => '',
	           'complement' => '',
	           'npa'        => '2000',
	           'ville'      => 'Neuchâtel',
	           'canton'     => '11',
	           'pays'       => '247',
	           'type'       => '2',
	           'user_id'    => '1',	           
	           'livraison'  => '0',	           
	           'deleted'    => '0',
	           'created_at' => date('Y-m-d G:i:s'),
			   'updated_at' => date('Y-m-d G:i:s')        
	        )
		);

		// Uncomment the below to run the seeder
		DB::table('adresses')->insert($addresses);
	}

}