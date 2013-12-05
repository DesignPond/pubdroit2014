<?php namespace Droit\Repo\Event;

use Illuminate\Database\Eloquent\Model;
use Droit\Repo\Event\EventInterface;
use Illuminate\Database\Eloquent\Model as M;

class EventEloquent implements EventInterface {

	protected $event;
	
	// Class expects an Eloquent model
	public function __construct(M $event)
	{
		$this->event = $event;	
	}
	
	public function getLast($nbr){
	
		//return $this->projet->with( array('user','theme') )->orderBy('id', 'DESC')->take($nbr)->skip(0)->get()->toArray();	
	}
	
	/*
	 * CRUD functions
	*/
		
	public function getAll(){
		
		//return $this->projet->with( array('theme','subtheme','user') )->get();		
	}
		
	public function find($id){
		
		//return $this->projet->with( array('user','theme') )->findOrFail($id)->toArray();			
	}
	
	public function create(array $data){
		
/*
		// Create the article
		$projet = $this->projet->create(array(
			'titre'       => $data['titre'],
			'description' => $data['description'],
			'user_id'     => $data['user_id'],
			'categorie_id'=> $data['categorie_id'],
			'theme_id'    => $data['theme_id'],
			'subtheme_id' => $data['subtheme_id']
		));
		
		if( ! $projet )
		{
			return false;
		}
		
		return true;
*/
	}
	
	public function update(array $data){
		
/*
		$projet = $this->projet->find($data['id']);
		
		if( ! $projet )
		{
			return false;
		}

		$projet->titre        = $data['titre'];
		$projet->description  = $data['description'];
		$projet->user_id      = $data['user_id'];
		$projet->categorie_id = $data['categorie_id'];
		$projet->theme_id     = $data['theme_id'];
		$projet->subtheme_id  = $data['subtheme_id'];
		$projet->save();	
		
		return true;
*/
	}
	
}

