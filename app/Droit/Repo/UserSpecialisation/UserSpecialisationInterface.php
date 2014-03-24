<?php namespace Droit\Repo\UserSpecialisation;

interface UserSpecialisationInterface {

	public function addToUser($membre,$user);
	public function removeFromUser($membre,$user);
	
}