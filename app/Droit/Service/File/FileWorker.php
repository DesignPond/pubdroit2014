<?php namespace Droit\Service\File;

use Intervention\Image\Facades\Image;

class FileWorker implements FileInterface {

	/*
	 * upload selected file 
	 * @return array
	*/	
	public function upload( $file , $desination ){
		
		$name = $file->getClientOriginalName();
		$ext  = $file->getClientOriginalExtension();
		$size = $file->getSize();
		$mime = $file->getMimeType();
		$new  = $file->move($desination,$name);
		$path = $new->getRealPath();
		
		// test resize
		
		$this->resize( $path, $path , 200 , null , true );
		$this->rename( $path, $name , 'files/test/' );
		
		$newfile = array( 'name' => $name ,'ext' => $ext ,'size' => $size ,'mime' => $mime ,'path' => $path  );
		
		if( $new )
		{			
			return $newfile;
		}
		
		return FALSE;
		
	}	
	
	/*
	 * rename file 
	 * @return instance
	*/	
	public function rename( $file , $name , $path ){
		
		$newpath = $path.$name;
		
		return Image::make( $file )->save($newpath);

	}
	
	/*
	 * resize file 
	 * @return instance
	*/	
	public function resize( $path, $name , $width = null , $height = null, $ratio ){
		
		return Image::make( $path )->resize($width, $height , $ratio)->save($name);
		
	}
    
}