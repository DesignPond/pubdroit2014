<?php namespace Droit\Service\Form\Membre;

use Crhayes\Validation\ContextualValidator;

class MembreValidator extends ContextualValidator
{
    protected $rules = array(
        'titreMembre' => 'required'
    );

    protected $messages = array(
        'titreMembre.required' => 'Le champs titre est requis'
    );
}