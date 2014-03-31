<?php

class MembresControllerTest extends TestCase {
		
	public function setUp()
	{
		parent::setUp();
	}
	
	public function tearDown()
    {
    }
	
	/**
	 * Membre index
	*/	 
	public function testIndex()
	{	
	    $this->get('admin/pubdroit/membre');
	    
	    $this->assertViewHas('membres');
	}

	/**
	 * Membre edit
	*/	 
	public function testEdit()
	{
		$response = $this->get('admin/pubdroit/membre/1/edit');
		
		$this->assertViewHas('membre');  
	}
	
	/**
	 * Membre create
	*/	 
	public function testCreate()
	{		
		$response = $this->get('admin/pubdroit/membre/create');
		
		$this->assertResponseOk();		
	}	
	
}