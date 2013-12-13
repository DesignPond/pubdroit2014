<?php namespace Droit\Service\File;

interface FileInterface{

	/*
	 * upload selected file 
	 * @return array
	*/	
	public function upload( $file , $desination );	
	
	/*
	 * rename file 
	 * @return array
	*/	
	public function rename( $file , $name , $path );
	
	/*
	 * resize file 
	 * @return array
	*/	
	public function resize( $path, $name , $width = null , $height = null , $ratio  );
    
}