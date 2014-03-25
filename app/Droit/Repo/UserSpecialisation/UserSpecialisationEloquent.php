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
	
	public function find($specialisation,$adresse_id){
		
		return $this->userspecialisation->where('specialisation_id' , '=' , $specialisation)->where('adresse_id' , '=' , $adresse_id)->get();		
	}
	
	public function addToUser($specialisation,$adresse_id){
	
		$userspecialisation = $this->userspecialisation->create(array(
			'specialisation_id' => $specialisation,
			'adresse_id'        => $adresse_id
		));
		
		if( ! $userspecialisation )
		{
			return false;
		}
		
		return true;	
	}
	
	public function remove($id){
	
		$userspecialisation = $this->userspecialisation->findOrFail($id);

		return $userspecialisation->delete();
	}
		
}