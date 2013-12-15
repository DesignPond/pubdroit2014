<?php namespace Droit\Service\Form\File;

use  Droit\Service\Validation\AbstractLaravelValidator;

class FileTypeValidator extends AbstractLaravelValidator {
	
	/*
	 * Validation rules
	*/	
	protected $rules = array(
		'file'     => 'mimes:jpeg,bmp,png,pdf,xls.docx|required'
	);
	
	/*
	 * Validation messages
	*/
	protected $messages = array(
		'file.required'  => 'Choisissez un document ou image',
		'file.mimes'     => 'Le type de document n\'est pas supporté'
	);
	
}