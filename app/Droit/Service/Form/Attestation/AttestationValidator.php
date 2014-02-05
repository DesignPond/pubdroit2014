<?php namespace Droit\Service\Form\Attestation;

use Crhayes\Validation\ContextualValidator;

class AttestationValidator extends ContextualValidator
{
    protected $rules = array(
        'lieu'         => 'required',
        'organisateur' => 'required',
        'signature'    => 'required'
    );

    protected $messages = array(
        'lieu.required'         => 'Le champs lieu est requis',
        'organisateur.required' => 'Le champs organisateur est requis',
        'signature.required'    => 'Le champs signature est requis'
    );
}

