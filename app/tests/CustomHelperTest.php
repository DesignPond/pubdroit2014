<?php

class CustomHelperTest extends TestCase {
	
	protected $custom;
	
	public function setUp()
	{
		parent::setUp();
		
		$this->custom = new Custom; 
	}

	public function testFindFileAndMAkeLinkIfExist()
	{		
		$actual = $this->custom->fileExistFormatLink( 'public/files/users/' , '1' , '4' , 'pdfbon' , 'Bon');
		
		$asset  = asset('public/files/users/1/pdfbon_4-1.pdf');
		
		$expect = '<a target="_blank" href="'.$asset.'">Bon</a>';
		
		$this->assertEquals($expect, $actual);
	}
	
	public function testGetMimeTypeOfFile()
	{		
		$url    = getcwd().'/public/files/carte/0c54ef754f2d71c00c26c90e430d7f79.jpg';
		
		$actual = $this->custom->getMimeType($url);

		$expect = 'image/jpeg';
		
		$this->assertEquals($expect, $actual);
	}
	
	public function testIfExistFormatImage()
	{		
		$url    = '/public/files/carte/0c54ef754f2d71c00c26c90e430d7f79.jpg';
		$width  = 100;
		
		$actual = $this->custom->fileExistFormatImage($url,$width);
		
		$asset = asset($url);

		$expect = '<img src="'.$asset.'" alt="" width="'.$width.'px" />';	
		
		$this->assertEquals($expect, $actual);
	}
	
}