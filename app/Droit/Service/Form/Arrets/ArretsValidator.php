<?php namespace Droit\Service\Form\Arrets;

use Crhayes\Validation\ContextualValidator;

class ArretsValidator extends ContextualValidator
{
    protected $rules = array(
        'reference' => 'required',
        'pub_date'  => 'required',
        'abstract'  => 'required',
        'pub_text'  => 'required'    
    );

    protected $messages = array(
        'reference.required' => 'Le champ référence est requis',
        'pub_date.required'  => 'Le champ date de publication est requis',
        'abstract.required'  => 'Le résumé signature est requis',
        'pub_text.required'  => 'Le texte signature est requis'
    );
}

