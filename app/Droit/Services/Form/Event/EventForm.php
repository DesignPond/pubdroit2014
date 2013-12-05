<?php namespace Droit\Services\Form\Event;

use  Droit\Repo\Event\EventInterface;
use  Droit\Services\Form\Event\EventFormValidator;

class EventForm {
	
	/*
	* Form Data
	*/
	protected $data;
	
	/*
	* Validator
	*/
	protected $validator;
	
	/*
	* event repository
	*/
	protected $event;
	
	public function __construct( EventFormValidator $validator , EventInterface $event )
	{
		$this->validator = $validator;
		$this->event    = $event;
	}
	
	/*
	* Create an new event
	*/
	public function save(array $input){
	
		if( ! $this->valid($input) )
		{
			return false;
		}
		
		return $this->event->create($input);
	}
	
	/*
	* Update an existing event
	*/
	public function update(array $input){
	
		if( ! $this->valid($input) )
		{
			return false;
		}
		
		return $this->event->update($input);
	}
	
	/*
	* Return any validation errors
	*/
	public function errors()
	{
		return $this->validator->errors();
	}

	/*
	* Test if form validator passes
	*/
	protected function valid(array $input)
	{
		return $this->validator->with($input)->passes();
	}
	
}

