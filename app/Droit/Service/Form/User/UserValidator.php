<?php namespace Droit\Service\Form\User;

use Crhayes\Validation\ContextualValidator;

class UserValidator extends ContextualValidator
{
    protected $rules = array(
    	'prenom'           => 'required',
    	'nom'              => 'required',
		'email'            => 'required|email|unique:users,email',
		'username'         => 'required|unique:users,username',
		'password'         => 'required',
		'password_confirm' => 'required|same:password',
    );

    protected $messages = array(
        'email.required'            => 'Le champ email est requis',
        'email.unique'              => 'Cet email est déjà utilisé',
        'prenom.required'           => 'Le champ prénom est requis',
        'nom.required'              => 'Le champ nom est requis',
        'username.required'         => 'Le nom d\'utilisateur est requis',
        'username.unique'           => 'Cet email est déjà utilisé comme nom d\'utilisateur',
        'password.required'         => 'Le champ mot de passe est requis',
        'password_confirm.required' => 'Veuillez confirmer le mot de passe',
        'password_confirm.same'     => 'Le mot de passe ne correspond pas'
    );
}

