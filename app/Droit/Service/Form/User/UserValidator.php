<?php namespace Droit\Service\Form\User;

use Crhayes\Validation\ContextualValidator;

class UserValidator extends ContextualValidator
{
    protected $rules = array(
		'email'            => 'required|email|exists:users,email',
		'username'         => 'required|exists:users,username',
		'password'         => 'required',
		'confirm_password' => 'required|same:password',
    );

    protected $messages = array(
        'email.required'     => 'Le champ email est requis',
        'username.exists'    => 'Cet email est déjà utilisé comme nom d\'utilisateur',
        'password.required'  => 'Le champ mot de passe est requis'
    );
}

