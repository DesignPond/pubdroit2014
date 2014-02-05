<?php namespace Droit\Service\Form\Event;

use Crhayes\Validation\ContextualValidator;

class EmailEventValidator extends ContextualValidator
{
    protected $rules = array(
        'message' => 'required'
    );

    protected $messages = array(
        'message.required' => 'Le champs message est requis'
    );
}

