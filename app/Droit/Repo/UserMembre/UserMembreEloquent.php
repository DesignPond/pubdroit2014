<?php namespace Droit\Repo\UserMembre;

use Droit\Repo\UserMembre\UserMembreInterface;
use User_membres as M;

class UserMembreEloquent implements UserMembreInterface {
	
	protected $usermembre;
	
	// Class expects an Eloquent model
	public function __construct(M $usermembre)
	{
		$this->usermembre = $usermembre;	
	}
	
	public function addToUser($membre,$user){
	
		$usermembre = $this->usermembre->create(array(
			'membre_id'  => $membre,
			'adresse_id' =>  $user
		));
		
		if( ! $usermembre )
		{
			return false;
		}
		
		return true;	
	}
	
	public function removeFromUser($membre,$user){
	
		$usermembre = $this->usermembre->where('membre_id' , '=' , $membre)->where('adresse_id' , '=' , $user);

		return $usermembre->delete();
	}
		
}