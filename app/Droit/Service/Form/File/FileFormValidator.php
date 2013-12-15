<?php namespace Droit\Service\Form\File;

use  Droit\Service\Validation\AbstractLaravelValidator;

class FileFormValidator extends AbstractLaravelValidator {
	
	/*
	 * Validation rules
	*/	
	protected $rules = array(
		'typeFile' => 'required',
		'event_id' => 'integer|required'
	);
	
	/*
	 * Validation messages
	*/
	protected $messages = array(
		'typeFile.required' => 'Le type est obligatoire',
		'event_id.required' => 'L\'id du colloque est obligatoire'
	);
	
}