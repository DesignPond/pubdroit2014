<?php namespace Droit\Repo\User;

use User as M;
use Civilites as Civilites;
use Event_options_user;

class UserInfoEloquent implements UserInfoInterface{

	protected $user;

	/**
	 * Construct a new SentryUser Object
	 */
	public function __construct(M $user)
	{
		$this->user = $user;
	}
	
	public function getAll(){
		
		return $this->user->with( array('adresses') )->get();
	}

	/**
	 * Return all infos of the user with insciption
	 *
	 * @return stdObject Collection of users
	 */
	public function find($id){
				
		return $this->user->where('id','=',$id)->with( array('adresses') )->first();														
	}
				
	/**
	 * Return all infos of the user with insciption
	 *
	 * @return stdObject Collection of users
	 */
	public function findWithInscription($id,$event){
				
		return $this->user
			->where('id','=',$id)
			->with( array('inscription' => function($query)use($event,$id){ 
								$query->where('inscriptions.event_id','=',$event)->where('inscriptions.user_id','=',$id); },
						  'adresses'    => function($query){ 
								$query->where('adresses.livraison','=',1); }) )
			->first();													
	}

	/**
	 * Return the name of the title (civilité)
	 *
	 * @return stdObject Collection of users
	 */	
	public function whatTitle($title){
		
		$civilites = \Civilites::all()->lists('title','id');
		
		return $civilites[$title];		
	}

	/**
	 * Return all options for user for an event
	 *
	 * @return stdObject Collection
	 */		
	public function eventOptions($user,$event){
		
		return \Event_options_user::join('event_options', 'event_options.id', '=','event_option_user.event_option_id')
									->where('event_options.event_id','=',$event)
									->where('user_id','=',$user)
									->get();
	}
	
}
