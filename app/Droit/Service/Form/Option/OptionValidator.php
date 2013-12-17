<?php namespace Droit\Service\Form\Option;

use Crhayes\Validation\ContextualValidator;

class OptionValidator extends ContextualValidator
{
    protected $rules = array(
        'titreOption' => 'required'
    );

    protected $messages = array(
        'titreOption.required' => 'Le champs titre est requis'
    );
}