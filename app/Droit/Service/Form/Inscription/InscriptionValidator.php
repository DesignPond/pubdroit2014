<?php namespace Droit\Service\Form\Inscription;

use Crhayes\Validation\ContextualValidator;

class InscriptionValidator extends ContextualValidator
{
    protected $rules = array(
		'event_id'        => 'required', 
		'user_id'         => 'required',
		'prix_id'         => 'required',
		'noInscription'   => 'required'
    );

    protected $messages = array(
        'event_id.required'        => 'L\'id du colloque est requis', 
		'user_id.required'         => 'L\'id de l\'utilisateur est requis',
		'prix_id.required'         => 'L\'id du prix est requis',
		'noInscription.required'   => 'Le numéro d\'inscription est requis'
    );
}