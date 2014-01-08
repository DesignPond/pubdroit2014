<?php namespace Droit\Repo\Categorie;

use Droit\Repo\Categorie\CategorieInterface;
use Illuminate\Database\Eloquent\Model as M;

class CategorieEloquent implements CategorieInterface {

	protected $arret;
	
	// Class expects an Eloquent model
	public function __construct(M $categorie)
	{
		$this->categorie = $categorie;
	}
	
	public function getAll( $pid ){
	
		return $this->categorie->where('pid','=',$pid)->get();	
	}
	
	public function find($id){
		
		return $this->categorie->findOrFail($id);	
	}
	
	public function create(array $data)
	{
		
	}
	
	public function update(array $data)
	{
		
	}
	
}