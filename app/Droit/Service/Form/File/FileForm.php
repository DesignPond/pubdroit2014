<?php namespace Droit\Service\Form\File;

use Droit\Service\Form\File\FileFormValidator;
use Droit\Service\Form\File\FileTypeValidator;
use Droit\Repo\File\FileInterface;

class FileForm {
	
	/*
	* Validator
	*/
	protected $validator;

	
	public function __construct( FileFormValidator $validator, FileTypeValidator $filevalidator, FileInterface $file )
	{
		$this->validator     = $validator;
		
		$this->filevalidator = $filevalidator;
		
		$this->file          = $file;
	}
	
	/*
	* Create an new file
	*/
	public function save(array $input){
	
		if( ! $this->valid($input) )
		{
			return false;
		}
		
		return $this->file->create($input);
	}
	
	/*
	* Return any validation errors
	*/
	public function errors()
	{
		return $this->validator->errors();
	}

	/*
	* Test if form validator passes
	*/
	protected function valid(array $input)
	{
		return $this->validator->with($input)->passes();
	}
	
	/*
	* Test if file validator type passes
	*/
	public function validtype(array $input)
	{
		return $this->filevalidator->with($input)->passes();
	}
	
}

