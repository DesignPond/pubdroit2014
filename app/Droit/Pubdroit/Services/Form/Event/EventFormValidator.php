<?php namespace Droit\Services\Form\Event;

use  Droit\Services\Validation\AbstractLaravelValidator;

class EventFormValidator extends AbstractLaravelValidator {
	
	/*
	 * Validation rules
	*/	
	protected $rules = array(
		'titre'        => 'required',
		'categorie_id' => 'required',
		'theme_id'     => 'required'
	);
	
	/*
	 * Validation messages
	*/
	protected $messages = array(
		'titre.required'        => 'Le titre est requis',
		'user_id.exists'        => 'That user does not exist',
		'categorie_id.required' => 'La catégorie principale est requise',
		'theme_id.required'     => 'Le thème est requis'
	);
	
}