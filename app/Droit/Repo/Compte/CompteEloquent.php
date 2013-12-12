<?php namespace Droit\Repo\Compte;

use Droit\Repo\Compte\CompteInterface;
use Illuminate\Database\Eloquent\Model as M;

class CompteEloquent implements CompteInterface {

	protected $compte;
	
	protected $today;
	
	// Class expects an Eloquent model
	public function __construct(M $compte)
	{
		$this->compte = $compte;	
	}
	
	/*
	 * CRUD functions
	*/
		
	public function getAll(){
		
		return $this->compte->get();		
	}
		
	public function find($id){
		
		return $this->compte->findOrFail($id);			
	}
	
	public function create(array $data){

		$compte = $this->compte->create(array(
			'adressesCompte' => $data['adressesCompte'],
			'motifCompte'    => $data['motifCompte'],
			'infoCompte'     => $data['infoCompte']
		));
		
		if( ! $compte )
		{
			return false;
		}
		
		return true;

	}
	
	public function update(array $data){
		
		$ompte = $this->compte->find($data['id']);
		
		if( ! $Compte )
		{
			return false;
		}
		
		$compte->adressesCompte = $data['adressesCompte'];
		$compte->motifCompte    = $data['motifCompte'];
		$compte->infoCompte     = $data['infoCompte'];	
		
		$compte->save();	
		
		return true;
	}
	
}

