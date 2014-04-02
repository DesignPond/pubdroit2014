<?php


class UserSpecialisationTest extends TestCase {

	protected $mock;
		
	public function setUp()
	{
		parent::setUp();

	    $this->mock = $this->mock('Droit\Repo\UserSpecialisation\UserSpecialisationInterface');
	    
	    $this->collection = Mockery::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();

	}
	 
	public function mock($class)
	{
	    $mock = Mockery::mock($class);
	 
	    $this->app->instance($class, $mock);
	 
	    return $mock;
	}
	
	/**
	 * add specialisation to user the user doesn't have the specialisation already
	*/	 
	public function testAddSpecialisationToUser()
	{	
		$this->mock->shouldReceive('find')->once()->andReturn(false);
		
		$this->mock->shouldReceive('create')->once()->andReturn(true);
	    
		$this->call('POST', 'admin/adresses/specialisation', array( 'specialisation_id' => 1 , 'adresse_id' => 2) );
 
		$this->assertRedirectedTo('admin/adresses/2', array('status' => 'success' ));	
	}
	
	/**
	 * add specialisation to user the user already hase the specialisation
	*/	 
	public function testAddSpecialisationToUser()
	{	
		$this->mock->shouldReceive('find')->once()->andReturn(true);
	    
		$this->call('POST', 'admin/adresses/specialisation', array( 'specialisation_id' => 1 , 'adresse_id' => 2) );
 
		$this->assertRedirectedTo('admin/adresses/2', array('status' => 'danger' ));	
	}

}