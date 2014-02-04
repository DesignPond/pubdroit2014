<?php namespace Droit\Service\Form\Price;

use Crhayes\Validation\ContextualValidator;

class PriceValidator extends ContextualValidator
{
    protected $rules = array(
        'remarquePrice' => 'required',
        'price'         => 'required'
    );

    protected $messages = array(
        'remarquePrice.required' => 'Le champs titre est requis',
        'price.required'         => 'Le champs prix est requis'
    );
}