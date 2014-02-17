<?php namespace Droit\Repo\User;

use User as U;

class UserInfoEloquent implements UserInfoInterface{

	protected $user;

	/**
	 * Construct a new SentryUser Object
	 */
	public function __construct(U $user)
	{
		$this->user = $user;

	}

	/**
	 * Return all infos of the user with insciption
	 *
	 * @return stdObject Collection of users
	 */
	public function find($id){
				
		return $this->user->findOrFail($id);													
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
	
}
