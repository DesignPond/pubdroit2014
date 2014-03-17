<?php

class CustomHelperTest extends TestCase {
	
	protected $custom;
	
	public function setUp()
	{
		parent::setUp();
		
		$this->custom = new Custom; 
	}
	
	public function tearDown() {

	}

	public function testfindFileAndMAkeLinkIfExist()
	{		
		$actual = $this->custom->fileExistFormatLink( 'public/files/users/' , '1' , '4' , 'pdfbon' , 'Bon');
		
		$asset  = asset('public/files/users/1/pdfbon_4-1.pdf');
		$expect = '<a target="_blank" href="'.$asset.'">Bon</a>';
		
		$this->assertEquals($expect, $actual);
	}

}