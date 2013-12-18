<?php namespace Droit\Repo\Inscription;

use Droit\Repo\Inscription\InscriptionInterface;
use Inscriptions as M;

class InscriptionEloquent implements InscriptionInterface {

	protected $inscription;
	
	// Class expects an Eloquent model
	public function __construct(M $inscription)
	{
		$this->inscription = $inscription;	
	}
	
	public function getLast($nbr){
	
		return $this->inscription->orderBy('id', 'DESC')->take($nbr)->skip(0)->get();	
	}
	
	/*
	 * CRUD functions
	*/
		
	public function getAll(){
		
		return $this->inscription->all();		
	}
		
	public function find($id){
		
		return $this->inscription->where('id', '=' ,$id)->with( array('prices','users') )->get();		
	}
	
	public function getEvent($event){
		
		return $this->inscription->where('event_id', '=' ,$event)->with( array('users'=> function($query) 
		{ 
			$query->join('adresses', 'users.id', '=', 'adresses.user_id');
			$query->where('adresses.type', '=', 2);
			
		}))->get();
		
	}
	
	public function create(array $data){
		
		// Create the article
		$inscription = $this->inscription->create(array(
			'event_id'        => $data['event_id'],
			'user_id'         => $data['user_id'],
			'price_id'        => $data['price_id'],
			'noInscription'   => $data['noInscription'],
			'dateInscription' => $data['dateInscription']
		));
		
		if( ! $inscription )
		{
			return false;
		}
		
		return true;
	}
	
	public function update(array $data){
		
		$inscription = $this->inscription->find($data['id']);
		
		if( ! $inscription )
		{
			return false;
		}

		$inscription->user_id         = $data['user_id'];
		$inscription->event_id        = $data['event_id'];
		$inscription->price_id         = $data['price_id'];
		$inscription->noInscription   = $data['noInscription'];
		$inscription->dateInscription = $data['dateInscription'];

		$inscription->save();	
		
		return true;

	}
	
}

