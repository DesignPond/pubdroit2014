<?php

use \Mockery as m;

class EventDatabaseTest extends TestCase {
	
	public function setUp()
	{
		parent::setUp();
 
		//$this->mock('Droit\Repo\Event\EventEloquent');	
	}
	
	public function tearDown() {
	
  	  m::close();
  	  
	}
	
	/**
	 * Event databes testing
	 */
	 
	public function testRetriveAllEvents()
	{
		
		$event = m::mock('Droit\Repo\Event\EventInterface');
        $event->shouldReceive('getAll')->once()->andReturn('mocked');
        
        $e = $event->getAll();
        
        $this->assertEquals('mocked', $e);		
	}


}