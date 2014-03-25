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
	
	public function find($membre,$adresse_id){
		
		return $this->usermembre->where('membre_id' , '=' , $membre)->where('adresse_id' , '=' , $adresse_id)->get();		
	}
	
	public function addToUser($membre,$adresse_id){	

		$usermembre = $this->usermembre->create(array(
			'membre_id'  => $membre,
			'adresse_id' => $adresse_id
		));
		
		if( ! $usermembre )
		{
			return false;
		}
		
		return true;	

	}
	
	public function remove($id){
	
		$usermembre = $this->usermembre->findOrFail($id);

		return $usermembre->delete();
	}
	
	public function test(){
	
		return true;
	}
		
}