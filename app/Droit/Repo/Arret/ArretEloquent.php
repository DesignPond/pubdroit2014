<?php namespace Droit\Repo\Arret;

use Droit\Repo\Arret\ArretInterface;
use Illuminate\Database\Eloquent\Model as M;

class ArretEloquent implements ArretInterface {

	protected $arret;
	
	// Class expects an Eloquent model
	public function __construct(M $arret)
	{
		$this->arret = $arret;	
	}
	
	public function getAll( $pid ){
	
		return $this->arret->where('pid','=',$pid)->with( array('arrets_categories','arrets_analyses') )->orderBy('pub_date', 'DESC')->get();	
	}
	
	public function find($id){
		
		return $this->arret->where('id','=',$id)->with( array('arrets_categories') )->with( array('arrets_categories') )->get();	
	}
	
	public function create(array $data)
	{
		
	}
	
	public function update(array $data)
	{
		
	}
	
}