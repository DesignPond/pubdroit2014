<?php namespace Droit\Service\Form\Event;

use  Droit\Service\Validation\AbstractLaravelValidator;

class EventFormValidator extends AbstractLaravelValidator {
	
	/*
	 * Validation rules
	*/	
	protected $rules = array(
		'organisateur'   => 'required',
		'titre'          => 'required',
		'sujet'          => 'required',
		'endroit'        => 'required',
		'dateDebut'      => 'required|date_format:Y-m-d',
		'dateDelai'      => 'required|date_format:Y-m-d'
	);
	
	/*
	 * Validation messages
	*/
	protected $messages = array(
		'organisateur.required'   => 'Le champ organisateur est requis',
		'titre.required'          => 'Le champ titre est requis',
		'sujet.required'          => 'Le champ sujet est requis',
		'endroit.required'        => 'Le champ endroit est requis',
		'dateDebut.required'      => 'Le champ date de début est requis',
		'dateDelai.required'      => 'Le champ délai d\'inscription est requis'
	);
	
}