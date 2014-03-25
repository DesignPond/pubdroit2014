<?php

class User extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');


	public function groups() 
	{
		return $this->belongsToMany('Groups', 'users_groups', 'user_id', 'group_id');
	}

	public function adresses() 
	{
		return $this->hasMany('Adresses' ,'user_id'); 
	}
	
	public function inscription(){
		
		return $this->hasMany('Inscriptions' ,'user_id'); 
	}

}