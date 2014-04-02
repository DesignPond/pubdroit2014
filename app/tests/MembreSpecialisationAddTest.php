<?php


class MembreSpecialisationAddTest extends TestCase {

	protected $usermembre;

	protected $userspecialisation;
		
	public function setUp()
	{
		parent::setUp();
		
		$this->membreMock = Mockery::mock('Eloquent', 'User_membres');		
		$this->app->instance('User_membres', $this->membreMock);

		$this->specialisationMock = Mockery::mock('Eloquent', 'User_specialisations');		
		$this->app->instance('User_specialisations', $this->specialisationMock);		
	}
	
	public function tearDown() {
	
  	 	\Mockery::close(); 	  
	}
	
	/**
	 * add membership to user
	*/	 

	public function test_add_membre_to_user()
	{	
		/*
		$this->usermembre = new Droit\Repo\UserMembre\UserMembreEloquent($this->membreMock); 
			
		$expect = $this->usermembre->addToUser(5,1);
        
        $this->assertTrue($expect);	
       	*/
	}


	/**
	 * add specialisation to user
	*/	 
/*
	public function test_add_specialisation_to_user()
	{	
		
		$this->userspecialisation = new Droit\Repo\Userspecialisation\UserSpecialisationEloquent($this->specialisationMock); 
			
		$expect = $this->userspecialisation->addToUser(1,1);
        
        $this->assertTrue($expect);	
       	
	}
*/

}