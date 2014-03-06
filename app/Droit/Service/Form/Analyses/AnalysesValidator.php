<?php namespace Droit\Service\Form\Arrets;

use Crhayes\Validation\ContextualValidator;

class AnalysesValidator extends ContextualValidator
{
    protected $rules = array(
        'authors'   => 'required',
        'pub_date'  => 'required',
        'abstract'  => 'required',
        'pub_text'  => 'required'    
    );

    protected $messages = array(
        'authors.required'   => 'Le champ auteur est requis',
        'pub_date.required'  => 'Le champ date de publication est requis',
        'abstract.required'  => 'Le résumé est requis',
        'pub_text.required'  => 'Le texte est requis'
    );
}

