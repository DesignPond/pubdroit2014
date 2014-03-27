<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	
	protected $custom;
	
	public function __construct(){
	
		// Custom helper				
		$this->custom      = new \Custom;
	}
	
	/**
	* The database table used by the model.
	*
	* @var string
	*/
	protected $table     = 'users';
	
	protected $guarded   = array('id');
	
	protected $fillable  = array('prenom', 'nom', 'username' , 'email' ,'password' , 'activated');
	
	/**
	* The attributes excluded from the model's JSON form.
	*
	* @var array
	*/
	protected $hidden = array('password');

	/**
	* Activate soft delete
	*
	* @var boolean
	*/	
	protected $softDelete = true;
	
	/**
	* Get the unique identifier for the user.
	*
	* @return mixed
	*/
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
	
	/**
	* Get the password for the user.
	*
	* @return string
	*/
	public function getAuthPassword()
	{
		return $this->password;
	}
	
	/**
	* Get the e-mail address where password reminders are sent.
	*
	* @return string
	*/
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	* Get the addresses for user
	*
	* @return object
	*/
	public function adresses() 
	{
		return $this->hasMany('Adresses' ,'user_id'); 
	}

	/**
	* Get all inscirption for user
	*
	* @return object
	*/	
	public function inscription(){
		
		return $this->hasMany('Inscriptions' ,'user_id'); 
	}
    
	public function groups() 
	{
		return $this->belongsToMany('Groups', 'users_groups', 'user_id', 'group_id');
	}
	
	

}