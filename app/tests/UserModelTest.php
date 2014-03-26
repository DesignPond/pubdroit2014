<?php


class UserModelTest extends TestCase {
	
	protected $mock;
	
	protected $user;
		
	public function setUp()
	{
		parent::setUp();
		
		$this->user  = \User::find(3);
	}
	
	public function tearDown() {
	
  	 	\Mockery::close(); 	  
	}
	
	/**
	 * add membership to user
	*/	 
	public function test_format_first_name_of_user()
	{	
				
		/*
		$name   = $this->user->formatFirstName();
		$expect = 'Anne-Marie';
        
        $this->assertEquals($name,$expect);	
		*/
       	
	}

}