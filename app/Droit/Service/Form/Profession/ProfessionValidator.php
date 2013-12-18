<?php namespace Droit\Service\Form\Profession;

use Crhayes\Validation\ContextualValidator;

class ProfessionValidator extends ContextualValidator
{
    protected $rules = array(
        'titreProfession' => 'required'
    );

    protected $messages = array(
        'titreProfession.required' => 'Le champs titre est requis'
    );
}