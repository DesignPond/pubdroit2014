<?php namespace Droit\Repo\Userspecialisation;

use Droit\Repo\UserSpecialisation\UserSpecialisationInterface;
use User_specialisations as M;

class UserSpecialisationEloquent implements UserSpecialisationInterface {
	
	protected $userspecialisation;
	
	// Class expects an Eloquent model
	public function __construct(M $userspecialisation)
	{
		$this->userspecialisation = $userspecialisation;	
	}
	
	public function addToUser($specialisation,$user){
	
		$userspecialisation = $this->userspecialisation->create(array(
			'specialisation_id'  => $specialisation,
			'adresse_id' =>  $user
		));
		
		if( ! $userspecialisation )
		{
			return false;
		}
		
		return true;	
	}
	
	public function removeFromUser($specialisation,$user){
	
		$userspecialisation = $this->userspecialisation->where('specialisation_id' , '=' , $specialisation)->where('adresse_id' , '=' , $user);

		return $userspecialisation->delete();
	}
		
}