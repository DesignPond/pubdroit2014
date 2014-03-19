<?php namespace Droit\Service\Form\adresse;

use Crhayes\Validation\ContextualValidator;

class AdresseValidator extends ContextualValidator
{
    protected $rules = array(
        'civilite'   => 'required',
		'prenom'     => 'required',
		'nom'        => 'required',
		'email'      => 'required',
		'profession' => 'required',
		'adresse'    => 'required',
		'npa'        => 'required',
		'ville'      => 'required',
		'pays'       => 'required',
		'type'       => 'required'
    );

    protected $messages = array(
        'civilite.required'   => 'Le champ civilité est requis',
		'prenom.required'     => 'Le champ prénom est requis',
		'nom.required'        => 'Le champ nom est requis',
		'email.required'      => 'Le champ email est requis',
		'profession.required' => 'Le champ profession est requis',
		'adresse.required'    => 'Le champ adresse est requis',
		'npa.required'        => 'Le champ npa est requis',
		'ville.required'      => 'Le champ ville est requis',
		'pays.required'       => 'Le champ pays est requis',
		'type.required'       => 'Le champ type d\'adresse est requis'
    );
}

