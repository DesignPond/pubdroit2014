<?php namespace Droit\Service\Form\Specialisation;

use Crhayes\Validation\ContextualValidator;

class SpecialisationValidator extends ContextualValidator
{
    protected $rules = array(
        'titreSpecialisation' => 'required'
    );

    protected $messages = array(
        'titreSpecialisation.required' => 'Le champs titre est requis'
    );
}