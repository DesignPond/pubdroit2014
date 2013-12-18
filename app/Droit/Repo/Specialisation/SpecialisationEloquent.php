<?php namespace Droit\Repo\Specialisation;

use Droit\Repo\Specialisation\SpecialisationInterface;
use Specialisations as M;

class SpecialisationEloquent implements SpecialisationInterface {
	
	protected $specialisation;
	
	// Class expects an Eloquent model
	public function __construct(M $specialisation)
	{
		$this->specialisation = $specialisation;	
	}
	
	public function getAll(){
		
		return $this->specialisation->all();
		
	}
	
	public function find($id){
	
		return $this->specialisation->findOrFail($id);	
		
	}
	
	public function delete($id){
	
		$specialisation = $this->specialisation->find($id);

		return $specialisation->delete();
		
	}
	
	public function create(array $data)
	{
		$specialisation = $this->specialisation->create(array(
			'titreSpecialisation' => $data['titreSpecialisation']
		));
		
		if( ! $specialisation )
		{
			return false;
		}
		
		return true;		
	}
	
	public function update(array $data)
	{
		$specialisation = $this->specialisation->findOrFail($data['id']);	
		
		if( ! $specialisation )
		{	
			return false;
		}
		
		$specialisation->titreSpecialisation  = $data['titreSpecialisation'];
		
		$specialisation->save();	
		
		return true;		
	}
	
}