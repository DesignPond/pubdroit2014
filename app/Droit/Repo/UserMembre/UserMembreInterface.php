<?php namespace Droit\Repo\UserMembre;

interface UserMembreInterface {

	public function addToUser($membre,$user);
	public function removeFromUser($membre,$user);
	
}