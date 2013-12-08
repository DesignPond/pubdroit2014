<?php namespace Droit\Repo\Inscription;

use Droit\Repo\Inscription\InscriptionInterface;
use Illuminate\Database\Eloquent\Model as M;

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
		
		return $this->inscription->get();		
	}
		
	public function find($id){
		
		//return $this->inscription->with( array('inscriptionsoptions') )->findOrFail($id);			
	}
	
	public function create(array $data){
		
/*
		// Create the article
		$inscription = $this->inscription->create(array(
			'titre'       => $data['titre'],
			'description' => $data['description'],
			'user_id'     => $data['user_id'],
			'categorie_id'=> $data['categorie_id'],
			'theme_id'    => $data['theme_id'],
			'subtheme_id' => $data['subtheme_id']
		));
		
		if( ! $inscription )
		{
			return false;
		}
		
		return true;
*/
	}
	
	public function update(array $data){
		
/*
		$inscription = $this->inscription->find($data['id']);
		
		if( ! $inscription )
		{
			return false;
		}

		$inscription->titre        = $data['titre'];
		$inscription->description  = $data['description'];
		$inscription->user_id      = $data['user_id'];
		$inscription->categorie_id = $data['categorie_id'];
		$inscription->theme_id     = $data['theme_id'];
		$inscription->subtheme_id  = $data['subtheme_id'];
		$inscription->save();	
		
		return true;
*/
	}
	
}

