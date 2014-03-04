<?php namespace Droit\Repo\Analyse;

use Droit\Repo\Analyse\AnalyseInterface;
use Illuminate\Database\Eloquent\Model as M;

class AnalyseEloquent implements AnalyseInterface {

	protected $analyse;
	
	// Class expects an Eloquent model
	public function __construct(M $analyse)
	{
		$this->analyse = $analyse;	
	}
	
	public function getAll( $pid ){
	
		return $this->analyse->where('pid','=',$pid)->where('deleted', '=', 0)->with( array('analyses_categories','analyses_arrets' => function($query)
		{
		    $query->where('ba_arrets.deleted', '=', 0);
		  
		}) )->orderBy('pub_date', 'DESC')->get();	
	}
	
	public function find($id){
		
		return $this->analyse->where('id','=',$id)->with( array('analyses_categories','analyses_arrets') )->get();	
	}
	
	public function create(array $data)
	{
		
	}
	
	public function update(array $data)
	{
		
	}
	
}