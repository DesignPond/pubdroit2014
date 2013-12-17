<?php namespace Droit\Repo\Option;

use Droit\Repo\Option\OptionInterface;
use Options as M;

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
	
	public function delete($id){
	
		$option = $this->option->find($id);

		return $option->delete();
		
	}
	
	public function create(array $data)
	{
		$option = $this->option->create(array(
			'titreOption' => $data['titreOption'],
			'typeOption'  => $data['typeOption'],
			'event_id'    => $data['event_id']
		));
		
		if( ! $option )
		{
			return false;
		}
		
		return true;		
	}
	
	public function update(array $data)
	{
		$option = $this->option->findOrFail($data['id']);	
		
		if( ! $option )
		{	
			return false;
		}
		
		$option->titreOption  = $data['titreOption'];
		$option->event_id     = $data['event_id'];
		
		if( isset($data['typeOption']) )
		{
			$option->typeOption   = $data['typeOption'];
		}
		
		$option->save();	
		
		return true;		
	}
	
}