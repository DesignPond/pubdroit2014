<?php namespace Droit\Repo\Option;

use Droit\Repo\Option\OptionInterface;

class OptionEloquent implements OptionInterface {
	
	protected $option;
	
	// Class expects an Eloquent model
	public function __construct(M $option)
	{
		$this->option = $option;	
	}
	
	public function getAll(){
		
		return $this->option->all();
		
	}
	
	public function find($id){
	
		return $this->option->findOrFail($id);	
		
	}
	
	public function create(array $data)
	{
		
	}
	
	public function update(array $data)
	{
		
	}
	
}