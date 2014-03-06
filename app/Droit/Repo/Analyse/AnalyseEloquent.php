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
	
		$categories = $data['categories'];
		$arrets     = $data['arrets'];
				
		$analyse = $this->arret->create(array(
			'pid'            => $data['pid'],
			'cruser_id'      => $data['cruser_id'],
			'authors'        => $data['authors'],
			'pub_date'       => $data['pub_date'],
			'pub_date_temp'  => $data['pub_date'], // to change
			'abstract'       => $data['abstract'],
			'pub_text'       => $data['pub_text'],
			'file'           => $data['file'],
			'categories'     => count($data['categories']),
			'arrets'         => count($data['arrets'])
		));
		
		if( ! $analyse )
		{
			return false;
		}
		
		// Categories insert in ba_analyses_categories table		
		if(!empty($categories))
		{
			foreach($categories as $index => $categorie)
			{
				$analyse_categorie = new \Analyses_categories;
				
				$analyse_categorie->analyse_id   = $analyse->id;
				$analyse_categorie->categorie_id = $categorie;
				$analyse_categorie->sorting      = $index;
						
				$analyse_categorie->save();
			}
		}
	
		return true;
			
	}
	
	public function update(array $data)
	{
		
	}
	
}