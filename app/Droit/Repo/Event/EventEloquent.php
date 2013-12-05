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
	
		return $this->event->orderBy('id', 'DESC')->take($nbr)->skip(0)->get()->toArray();	
	}
	
	/*
	 * CRUD functions
	*/
		
	public function getAll(){
		
		return $this->event->with( array('prices','eventsoptions') )->get();		
	}
		
	public function find($id){
		
		return $this->event->with( array('prices','eventsoptions') )->findOrFail($id)->toArray();			
	}
	
	public function create(array $data){
		
/*
		// Create the article
		$event = $this->event->create(array(
			'titre'       => $data['titre'],
			'description' => $data['description'],
			'user_id'     => $data['user_id'],
			'categorie_id'=> $data['categorie_id'],
			'theme_id'    => $data['theme_id'],
			'subtheme_id' => $data['subtheme_id']
		));
		
		if( ! $event )
		{
			return false;
		}
		
		return true;
*/
	}
	
	public function update(array $data){
		
/*
		$event = $this->event->find($data['id']);
		
		if( ! $event )
		{
			return false;
		}

		$event->titre        = $data['titre'];
		$event->description  = $data['description'];
		$event->user_id      = $data['user_id'];
		$event->categorie_id = $data['categorie_id'];
		$event->theme_id     = $data['theme_id'];
		$event->subtheme_id  = $data['subtheme_id'];
		$event->save();	
		
		return true;
*/
	}
	
}

